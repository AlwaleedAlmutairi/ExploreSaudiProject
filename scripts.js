const themeToggleBtn = document.getElementById('theme-toggle');

if (localStorage.getItem('theme') === 'dark') {
  document.body.classList.add('dark-mode');
  themeToggleBtn.innerHTML = "الوضع النهاري";
}


themeToggleBtn.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
  

  if (document.body.classList.contains('dark-mode')) {
    localStorage.setItem('theme', 'dark');
    themeToggleBtn.innerHTML = "الوضع النهاري";
  } else {
    localStorage.setItem('theme', 'light');
    themeToggleBtn.innerHTML = "الوضع الليلي";
  }
});




/* Live time saudi arabia */
document.addEventListener('DOMContentLoaded', function() {
    const place = document.getElementById("footerhome");
    const element = document.createElement("p");
    

    element.style = "font-weight: bold; font-size:.7em; opacity:0.7; margin:15px;";
    place.appendChild(element);


    const options = {
        timeZone: 'Asia/Riyadh',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true 
    };

    const formatter = new Intl.DateTimeFormat('ar-SA', options);


    function updateTime() {
        const now = new Date();
        const arabicTime = formatter.format(now);
        element.textContent = "التوقيت الحالي في المملكة العربية السعودية: " + arabicTime;
    }


    updateTime();
    setInterval(updateTime, 1000);
});





/*login page valdation */
var formLogin = document.getElementById("loginform");
if(formLogin){
    document.getElementById("loginform").onsubmit = function(event) {
        var user = document.getElementById("usern").value;
        var pass = document.getElementById("passw").value;

        if((user == null || user == "") || (pass == null || pass == "")){
            alert("يرجى تعبئة الخانات الفارغة");
            event.preventDefault();
        }

    }
}


/*addcontent page valdation */
var formaddcontent = document.getElementById("addcontform");

if(formaddcontent){
    formaddcontent.onsubmit = function(event) {
        var cname = document.getElementById("cityn").value;
        var cdes = document.getElementById("regDesc2").value;
        var ginfos = document.getElementById("ginfo").value;
        var famouss = document.getElementById("famousplac").value;


        var mimg = document.getElementById("mainimg"); 
        var gimag = document.getElementById("gallerym");


        if(cname === "" || cdes === "" || ginfos === "" || famouss === ""){
            alert("يرجى تعبئة الخانات الفارغة");
            event.preventDefault();
        }

        else if(!((ginfos.startsWith('(') && ginfos.endsWith(')')) && (famouss.startsWith('(') && famouss.endsWith(')')))){
            alert("يرجى الالتزام بالصيغة المحددة (أ,ب,..)");
            event.preventDefault();
        }

        else if(mimg.files.length === 0){
            alert("يرجى اختيار صورة رئيسية");
            event.preventDefault();
        }

        else if(gimag.files.length === 0){
            alert("يرجى اختيار صور في خانة معرض الصور");
            event.preventDefault();
        }
    };
}





/*Updatecontent page valdation */
var formaupdcontent = document.getElementById("Updatecontform");

if(formaupdcontent){
    formaupdcontent.onsubmit = function(event) {
        var cname = document.getElementById("cityn").value;
        var cdes = document.getElementById("cityd").value;
        var ginfos = document.getElementById("ginfo").value;
        var famouss = document.getElementById("famousplac").value;




        if(cname === "" || cdes === "" || ginfos === "" || famouss === ""){
            alert("يرجى تعبئة الخانات الفارغة");
            event.preventDefault();
        }

        else if(!((ginfos.startsWith('(') && ginfos.endsWith(')')) && (famouss.startsWith('(') && famouss.endsWith(')')))){
            alert("يرجى الالتزام بالصيغة المحددة (أ,ب,..)");
            event.preventDefault();
        }
    };
}