const selectElement = document.querySelector('.tm-search-input');

selectElement.addEventListener('keyup', (event) => {
    
    const result = document.querySelector('.tm-search-input');
    let textContent = event.target.value;
    filterSelection (textContent);
});


selectElement.addEventListener('click', (event) => {
    
    //const result = document.querySelector('.tm-search-input');
    //let textContent = event.target.value;
    //if (textContent=="") filterSelection("all");
    //filterSelection (textContent);
    //filterSelection("all");
    event.target.value="";
    x = document.getElementsByClassName("project");
  for (i = 0; i < x.length; i++) {
    w3AddClass(x[i], "show");}
});




filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("project");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    //if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    let nom=x[i].getAttribute('project-name');
    c=c.toLowerCase();
    nom=nom.toLowerCase();
    if (nom.includes(c)) w3AddClass(x[i], "show");
      
   let autora=x[i].querySelector(".autora");
    if (typeof autora !== 'undefined' && autora !== null) {
         autora=autora.innerHTML.toLowerCase();
         if (autora.includes(c)) w3AddClass(x[i], "show");
    } 
   }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


/**/ // Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  }); 
}
