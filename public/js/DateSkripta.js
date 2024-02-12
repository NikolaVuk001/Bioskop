
        
        function formatDate(date = new Date()) {
          const year = date.toLocaleString('default', {year: 'numeric'});
          const month = date.toLocaleString('default', {
            month: '2-digit',
          });
          const day = date.toLocaleString('default', {day: '2-digit'});
        
          return [year, month, day].join('-');
        }
        
        
        const format = {
            weekday: "short",
            year: "numeric",
            month: "short",
            day: "numeric",
        };

        let startDay =  new Date();
        
        let sutra1 = new Date();
        let sutra2 = new Date();
        let sutra3 = new Date();
        let sutra4 = new Date();
        let sutra5 = new Date();
        let sutra6 = new Date();

        sutra1.setDate(startDay.getDate()+1);
        sutra2.setDate(startDay.getDate()+2);
        sutra3.setDate(startDay.getDate()+3);
        sutra4.setDate(startDay.getDate()+4);
        sutra5.setDate(startDay.getDate()+5);
        sutra6.setDate(startDay.getDate()+6);

        let strDate1 = formatDate(startDay);
        let strDate2 = formatDate(sutra1);
        let strDate3 = formatDate(sutra2);
        let strDate4 = formatDate(sutra3);
        let strDate5 = formatDate(sutra4);
        let strDate6 = formatDate(sutra5);
        let strDate7 = formatDate(sutra6);


        let select = document.querySelector('#datumi');
        let dates = [
          {
            str: "Danas, " + startDay.toLocaleString('sr-SR',format),
            dtm: strDate1,
          },
          {
            str: "Sutra, " + sutra1.toLocaleString('sr-SR',format),
            dtm: strDate2,
          },
          {
            str: sutra2.toLocaleString('sr-SR',format),
            dtm: strDate3,
          },
          {
            str: sutra3.toLocaleString('sr-SR',format),
            dtm: strDate4,
          },
          {
            str: sutra4.toLocaleString('sr-SR',format),
            dtm: strDate5,
          },
          {
            str: sutra5.toLocaleString('sr-SR',format),
            dtm: strDate6,
          },
          {
            str: sutra6.toLocaleString('sr-SR',format),
            dtm: strDate7,
          },           
      ];
        

      
        let options = dates.map(date => `<option value="${date.dtm}"> ${date.str} </option>`).join('\n');
        select.innerHTML += options;
      
        
