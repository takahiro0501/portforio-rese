const week = ["日", "月", "火", "水", "木", "金", "土"];
const today = new Date();
const showDate = new Date(today.getFullYear(), today.getMonth(), 1);

//カレンダー追加関数
const addCalender = (date,shopId) => {
  const year = date.getFullYear();
  let month = date.getMonth();
  const param = [{ 'date' : year + ('0' + Number(month + 1)).slice(-2) , 'shopId' : shopId}];
  //予約データ取得
  fetch('getData', {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
      body: JSON.stringify(param)
  })
  .then((response) => {
      return response.json();
  })
    .then((reservationData) => {
      const calendar = createCalender(year, month, reservationData);
      if (month == 0) { month = 12; };
      document.querySelector('#year-month').innerHTML = year + '年 ' + Number(month+1) + '月';
      document.querySelector('#calender-contents').innerHTML = calendar;
  })
  .catch(error => {
      console.error('エラーが発生', error);
  })
}

//カレンダー作成関数
const createCalender = (year, month, reservationData) => {
  let calendar = "<table class='reserveTable'>";
  // 曜日行の作成
  calendar += "<tr class='dayOfWeek'>";
  for (let i = 0; i < week.length; i++) {
      if(i == 0) {
          calendar += "<th class='sunday'>" + week[i] + "</th>";            
      }else if(i == 6){
          calendar += "<th class='saturday'>" + week[i] + "</th>";                        
      }else {
          calendar += "<th>" + week[i] + "</th>";            
      }
  }
  calendar += "</tr>";

  //１日の曜日を取得
  const startDayOfWeek = new Date(year, month, 1).getDay();
  //対象月の最終日を取得
  const endDate = new Date(year, month + 1, 0).getDate();
  //前の月の最終日を取得
  const lastMonthEndDate = new Date(year, month, 0).getDate();
  //ひと月辺りの週の数を取得
  let row = Math.ceil((startDayOfWeek + endDate) / week.length);

  //カレンダー作成
  let count = 1;
  for (let i = 0; i < row; i++) {
    calendar += "<tr>";
    for (let j = 0; j < week.length; j++) {
      //先月の日の判定
      if (i == 0 && j < startDayOfWeek) {
        calendar += "<td class='disabled'></td>";
      //次月日表示の判定
      } else if (count > endDate) {
        calendar += "<td class='disabled'></td>";
        count++;
        //今月日表示の判定
      } else {
        let date = year  + '/' + ('0' + Number(month + 1)).slice(-2) + '/' + ('0' + count).slice(-2);
        if (new Date(year, month, count+1).getTime() < today.getTime()) {
          calendar += "<td class='disabled'>" + count + "</td>";
        } else {
          if (reservationData !== null) {
            let flg = 0;
            reservationData.forEach(el => {
              //該当する日付けに予約データがある場合
              if (Number(el['date']) == count) {
                //ネット予約不可能（×、TEL）な場合
                if (el['reserve'] == '×' || el['reserve'] == 'TEL') {
                  calendar += "<td class='disabled'><p>" + count + '</p><p>' + el['reserve'] + "</p></td>";
                  flg = 1;
                //ネット予約可能な場合
                } else {
                  calendar += "<td class='active-day' data-target='" + date + "'><p>" + count + '</p><p>' + el['reserve'] + "</p></td>";
                  flg = 1;
                }
              } 
            });
            if (flg == 0) {
              calendar += "<td class='active-day' data-target='" + date + "'><p>" + count + '</ p><p>' + '◎' + "</p></td>";
            }
          } else {
            calendar += "<td class='active-day' data-target='" + date + "'><p>" + count + '</ p><p>' + '◎' + "</p></td>";
          }
        }
        count++;
      }
    }
    calendar += "</tr>";
  }
  return calendar;
}

export default { addCalender };

        // let key = 'd' + count;
        // let date = year  + ('0' + Number(month + 1)).slice(-2) + ('0' + count).slice(-2);
        //         if(year == today.getFullYear() && month == (today.getMonth()) && count == today.getDate()) {
        //             if (rData[key] == '－') {
        //                 calendar += "<td class='today'><p>" + count + "</p><p>" + rData[key] + "</p ></td > ";                        
        //             } else {
        //                 calendar += "<td class='today day'><a href='javascript:calendarSubmit(" + date + ");'><p>" + count + "</p><p>" + rData[key] + "</p ></a></td> ";
        //             }
        //         } else {
        //             if (rData[key] == '－') {
        //                 calendar += "<td><p>" + count + "</p><p>" + rData[key] + "</p ></td > ";
        //             } else {
        //                 calendar += "<td class='day'><a href='javascript:calendarSubmit(" + date + ");'><p>" + count + "</p><p>" + rData[key] + "</p ></a></td> ";
        //             }
        //         }
