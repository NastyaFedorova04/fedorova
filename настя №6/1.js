function correctdate(date) {
  if (isblank(date)) {
    return "Дата некорректна";
  }
  date = date.toString();
  let massiv = date.split("-");
  if (parseInt(massiv[1]) < 10) {
    massiv[1] = '0' + parseInt(massiv[1]);
  }
  else{}
  if (parseInt(massiv[2]) < 10) {
    massiv[2] = '0' + parseInt(massiv[2]);
  }
  else{}
  return "Дата:" + massiv[2] + "." + massiv[1] + "." + massiv[0];
  
}
let form = document.getElementById("reg_form");

form.addEventListener("submit", function(event){
    event.preventDefault(); 
  

    let errors = document.querySelectorAll(".error-text");

    if(errors.length){
        Array.from(errors).forEach((errorSpan) => {
            errorSpan.parentElement.classList.remove("error");
            errorSpan.remove();
        })
    }

    let hasError = false;

    let nameInput = document.querySelector("#name");
    let emailInput = document.querySelector("#email");
    let phoneInput = document.querySelector("#phone");
    let cityInput = document.querySelector("#city");

    let fields = [nameInput, emailInput, phoneInput, cityInput];

    fields.forEach((field) => {
        if(field.value == ""){
            let span = document.createElement("span");
            span.className = "error-text"; // span.classList.add("error-text");
            span.innerText = "Заполните поле";
            field.insertAdjacentElement("afterend", span);
            field.parentElement.classList.add("error");
            hasError = true;
        }
    });

    let a = ["#ec", "#com", "#bus", "#fir"];

    let checked = a.some((radioId) => {
        return document.querySelector(radioId).checked; //document.querySelector(radioId) - input
    })

    if(!checked){
        let span = document.createElement("span");
        span.className = "error-text"; // span.classList.add("error-text");
        span.innerText = "Выберите класс обслуживания";
        document.querySelector("#fir").parentElement.insertAdjacentElement("afterend", span);
        hasError = true;
    }

    let num = ["#b", "#c", "#d", "#e"];

    checked = num.some((checkboxId) => {
        return document.querySelector(checkboxId).checked; //document.querySelector(checkbox) - input
    })

    if(!checked){
        let span = document.createElement("span");
        span.className = "error-text"; // span.classList.add("error-text");
        span.innerText = "Выберите количество пассажиров";
        document.querySelector("#e").parentElement.insertAdjacentElement("afterend", span);
        hasError = true;
    }

    if(!hasError){
        let div = document.querySelector(".result");

        div.innerHTML += `Откуда: ${nameInput.value}<br>`;
        div.innerHTML += `Куда: ${cityInput.value}<br>`;
        div.innerHTML += `Email: ${emailInput.value}<br>`;
        div.innerHTML += `Телефон: ${phoneInput.value}<br>`;

        if(document.querySelector("#ec").checked){
            div.innerHTML += `Класс обслуживания: ${document.querySelector("#ec").value}<br>`;
        } else if(document.querySelector("#com").checked){
            div.innerHTML += `Класс обслуживания: ${document.querySelector("#com").value}<br>`;
        } else if(document.querySelector("#bus").checked){
            div.innerHTML += `Класс обслуживания: ${document.querySelector("#bus").value}<br>`;
        } else if(document.querySelector("#fir").checked){
            div.innerHTML += `Класс обслуживания: ${document.querySelector("#fir").value}<br>`;
        } 

        let aValue = [];

        a.forEach((a) => {
            if(document.querySelector(a).checked){
                hobbyValue.push(document.querySelector(a).value);
            }
        })

        div.innerHTML += `Класс обслуживания: ${aValue.join(",")}<br>`;

        this.reset(); 
    }
})