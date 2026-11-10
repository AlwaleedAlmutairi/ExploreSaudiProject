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




/*Date Time */
document.addEventListener('DOMContentLoaded', function() {
    const place = document.getElementById("footerhome");
    const elment = document.createElement("p");
    const currentDate = new Date();
    const options = { 
    weekday: 'long', 
    year: 'numeric', 
    month: 'long', 
    day: 'numeric' 
    };
    const arabicDate = new Intl.DateTimeFormat('ar-SA', options).format(currentDate);

    const textNode = document.createTextNode("تم تحميل الصفحة بيوم   " + arabicDate);
    elment.appendChild(textNode);
    elment.style = "font-weight: bold; font-size:.7em; opacity:0.7; margin:15px;";
    place.appendChild(elment);
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