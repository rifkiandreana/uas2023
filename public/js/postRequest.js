const postRequest = (form, url, btnSubmit, btnSubmitText) => {
  btnSubmitText = btnSubmit.innerHTML;
  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    const xhr = new XMLHttpRequest();

    xhr.open("POST", url, true);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.responseType = "json";

    xhr.onloadstart = () => {
      btnSubmit.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
    };

    xhr.onloadend = () => {
      btnSubmit.innerHTML = btnSubmitText;
    };

    xhr.onload = () => {
      const response = xhr.response;

      if (response.status || response.status === "error") {
        // alert(response.message);
        window.location.href = response.redirectUrl;
      } else {
        Object.keys(response.errors).forEach((key) => {
          const input = document.querySelector(`[name="${key}"]`);
          input.classList.add("is-invalid");
          input.nextElementSibling.innerHTML = response.errors[key];

          if (response.errors[key] === "") {
            input.classList.remove("is-invalid");
            input.nextElementSibling.innerHTML = "";
            input.classList.add("is-invalid");
          }
        });
      }
    };

    xhr.send(formData);
  });

  const formInputs = form.querySelectorAll("input");
  formInputs.forEach((input) => {
    input.addEventListener("keyup", () => {
      input.classList.remove("is-invalid");
      input.nextElementSibling.innerHTML = "";
    });
  });
};

export { postRequest };
