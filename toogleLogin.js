        var acBox = document.querySelector("#accnBox");
        var toggle = true;
         document.addEventListener("click", function (e) {
           // console.log(e.target);
            if (toggle && e.target.id === 'person' || acBox.contains(e.target)) {
                 acBox.style.display = "block";
                 toggle = false;
                
             } else {
                 acBox.style.display = "none";
                 toggle = true;      
             }

        }); 