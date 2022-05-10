const getValue = () => {
  clearMessage();
  title = document.getElementById("title").value;
  author = document.getElementById("author").value;

  if (title == "" || author == "") {
    displayError("Please fill all the inputs");
    return false;
  }
  data = {
    title: title,
    author: author,
  };

  return data;
};

const displayError = (message) => {
  const danger_div = document.getElementById("error");
  danger_div.classList.add("p-3");
  const error_para = document.getElementById("error_text");
  error_para.textContent = message;
};

const displaySuccessMsg = (message) => {
  const success_div = document.getElementById("success");
  success_div.classList.add("p-3");
  const success_para = document.getElementById("success_text");
  success_para.textContent = message;
};

const postData = (data) => {
  fetch(urlAPI + "create.php", {
    method: "POST",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((reponse) => reponse.json())
    .then((response) => displaySuccessMsg(response.message));
};

const clearMessage = () => {
  const danger_div = document.getElementById("error");
  danger_div.classList.remove("p-3");
  const error_para = document.getElementById("error_text");
  error_para.textContent = "";
};
