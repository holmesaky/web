const container = document.querySelector(".container"),
    pwShowHide = document.querySelectorAll(".showHidePw"),
    pwFields = document.querySelectorAll(".password"),
    signUp = document.querySelector(".signup-link"),
    login = document.querySelector(".login-link");

//   js code to show/hide password and change icon
pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        pwFields.forEach(pwField => {
            if (pwField.type === "password") {
                pwField.type = "text";

                pwShowHide.forEach(icon => {
                    icon.classList.replace("uil-eye-slash", "uil-eye");
                })
            } else {
                pwField.type = "password";

                pwShowHide.forEach(icon => {
                    icon.classList.replace("uil-eye", "uil-eye-slash");
                })
            }
        })
    })
})

// js code to appear signup and login form
signUp.addEventListener("click", () => {
    container.classList.add("active");
});
login.addEventListener("click", () => {
    container.classList.remove("active");
});

function show() {
    const searchBox = document.querySelector(".search-box");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const searchInput = document.querySelector("input");
    const searchData = document.querySelector(".search-data");

    if (!searchBtn.classList.contains("active")) {
        searchBox.classList.add("active");
        searchBtn.classList.add("active");
        searchInput.classList.add("active");
        cancelBtn.classList.add("active");
        searchInput.focus();
        if (searchInput.value != "") {
            var values = searchInput.value;
            searchData.classList.remove("active");
            searchData.innerHTML = "You just typed " + "<span style='font-weight: 500;'>" + values + "</span>";
        } else {
            searchData.textContent = "";
        }
    } else {
        searchBox.classList.remove("active");
        searchBtn.classList.remove("active");
        searchInput.classList.remove("active");
        cancelBtn.classList.remove("active");
        searchData.classList.toggle("active");
        searchInput.value = "";
    }
}

function show1(temp) {
    const searchBox = document.querySelector(temp);
    const cars = [".down-5", ".down-4"];
    for (var i = 0; i < cars.length; i++) {
        if (temp !== cars[i]) {
            document.querySelector(cars[i]).classList.add("fa-caret-down");
        }
    }

    if (searchBox.classList.contains("fa-caret-down")) {

        searchBox.classList.add("fa-caret-up");
        searchBox.classList.remove("fa-caret-down");

    } else {
        searchBox.classList.add("fa-caret-down");
        searchBox.classList.remove("fa-caret-up");
    }
}

function show2(temp) {
    const searchBox = document.querySelector(temp);
    const cars = [".down-1", ".down-2", ".down-3"];
    for (var i = 0; i < cars.length; i++) {
        if (temp !== cars[i]) {
            document.querySelector(cars[i]).classList.add("fa-caret-down");
        }
    }



    if (searchBox.classList.contains("fa-caret-down")) {

        searchBox.classList.add("fa-caret-up");
        searchBox.classList.remove("fa-caret-down");

    } else {
        searchBox.classList.add("fa-caret-down");
        searchBox.classList.remove("fa-caret-up");
    }
}