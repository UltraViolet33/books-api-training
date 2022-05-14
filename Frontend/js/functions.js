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

const displayMsgBack = (message) => {
  console.log(message.success);
  const success_div = document.getElementById("success");
  success_div.classList.add("p-3");
  const success_para = document.getElementById("success_text");

  if (message.success) {
    success_para.textContent = message.success;
    window.location.replace("http://127.0.0.1:5500/Frontend/index.html");
  }
  if (message.error) {
    success_para.textContent = message.error;
  }
};

const postData = (data, path) => {
  fetch(urlAPI + path, {
    method: "POST",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => response.json())
    .then((response) => displayMsgBack(response));
};

const clearMessage = () => {
  const danger_div = document.getElementById("error");
  danger_div.classList.remove("p-3");
  const error_para = document.getElementById("error_text");
  error_para.textContent = "";
};

const extractParamsFromUrl = (nameParam) => {
  let params = new URLSearchParams(window.location.search);

  for (let p of params) {
    if (p[0] === nameParam) {
      if (isNaN(p[1])) {
        return false;
      }
      return p[1];
    }
  }

  return false;
};
