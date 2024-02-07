
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
        let select = document.querySelector('#datumi');
        let dates = ["Danas, " + startDay.toLocaleString('sr-SR',format),
                     "Sutra, " + sutra1.toLocaleString('sr-SR',format),
                     sutra2.toLocaleString('sr-SR',format),
                     sutra3.toLocaleString('sr-SR',format),
                     sutra4.toLocaleString('sr-SR',format),
                     sutra5.toLocaleString('sr-SR',format),
                     sutra6.toLocaleString('sr-SR',format)             
      ];
        

        let options = dates.map(date => `<option value=${(date.toLowerCase()).slice(0,3)}>${date}</option>`).join('\n');
        select.innerHTML = options;
