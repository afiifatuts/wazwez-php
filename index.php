<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wazwez";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM Tasks ORDER BY task_id DESC;";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Wazwez App</title>
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>

  <body>
    <header>
      <img src="assets/img/logo-wazwez.png" alt="logo" class="logo-brand" />
      <nav>
        <div class="icon-notification"></div>
        <div class="user-profile">
          <div class="user-avatar"></div>
          <div class="user-name">Username</div>
          <div class="user-arrow"></div>
        </div>
      </nav>
    </header>

    <main>
      <div id="container" class="container padding-4 padding5">
        <nav>
          <div class="mytask">My Task</div>
          <div class="todolist">
            <div class="todolist2">
              To do List <br />
              Buat list tugas saya
            </div>
            <button class="button-add" onmouseenter="hoverButton()" onclick="addTask()">
              Tambah Tugas
            </button>
          </div>
          <div class="short-by">
            <div>Short by</div>
            <select class="short-by-option">
              <option>By Tanggal</option>
              <option>By Time</option>
              <option>Terbaru</option>
            </select>
          </div>
          <div id="new-data-form" class="new-data hidden">
            <input class="input-form" id="name" oninput="handleChange(this)" placeholder="Masukkan nama tugas"/>
            <input class="input-form" id="desc" oninput="handleChange(this)" placeholder="Deskripsi tugas(Optional)"/>
            <input class="input-form" id="date" oninput="handleChange(this)" placeholder="Tanggal input"/>
          </div>
          <div class="list-task">
            <ul id="list-container" class="list-container">

            <?php
            foreach ($result as $data){
              echo "<li onclick=\"handleDone(this)\" class=\"list-item\">"."<input class=\"radio-list-task\">".$data['name']."</li>";
            }
            ?>
            </ul>
          </div>
        </nav>
      </div>
    </main>
  </body>
  <script>
    function addTask() {
      document.getElementById("new-data-form").classList.remove("hidden");
    }
    function handleShowSubTask() {
      console.log(param.innerHTML);
      if (param.innerHTML.includes("hidden")) {
        param.innerHTML = param.innerHTML.replace("hidden", "show");
      } else {
        param.innerHTML = param.innerHTML.replace("show", "hidden");
      }
    }

    document.addEventListener("keypress", function (e) {
      const addFromClasslist =
        document.getElementById("new-data-form").classList;
      if (addFromClasslist.contains("hidden") === false) {
        if (e.key === "Enter") {
          const task = {
            name: document.getElementById("name").value,
            desc: document.getElementById("desc").value,
            date: document.getElementById("date").value,
          };
          if (task?.name) {
            handleEnter(task);
            document.getElementById("name").value = "";
            document.getElementById("desc").value = "";
            document.getElementById("date").value = "";
          } else {
            alert("name wajib diisi");
          }
        }
      }
    });

    function handleDone(params){
      console.log(params)
      params.style =" text-decoration: line-through;"
    }

    function handleEnter(task){
      document.getElementById("new-data-form").classList.add("hidden");
      let listContainer =document.getElementById("list-container");
      listContainer.insertAdjacentHTML("afterbegin",'<li class="list-item">${task.name}</li>');
      listContainer.insertAdjacentHTML("afterend",'<div class="accordion" onclick="handleShowSubtask(this)"> <div class="task">${task.name} - ${task.date}</div> <div class="subtask hidden"> ini subtask</div> </div>');
    }

    function handleChange(params){
      console.log(params.value);
    }
  </script>
</html>
