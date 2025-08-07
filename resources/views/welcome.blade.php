<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Interactive To-Do List</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      width: 90%;
      max-width: 400px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .input-group {
      display: flex;
      gap: 10px;
    }

    input[type="text"] {
      flex: 1;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    button {
      padding: 10px 15px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background: #0056b3;
    }

    ul {
      list-style: none;
      padding: 0;
      margin-top: 20px;
    }

    li {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #f9f9f9;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      transition: all 0.2s;
    }

    li.completed span {
      text-decoration: line-through;
      color: gray;
    }

    .actions button {
      margin-left: 5px;
      background: none;
      color: #333;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }

    .actions button:hover {
      color: red;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>📝 To-Do List</h1>
    <div class="input-group">
      <input type="text" id="taskInput" placeholder="Add a new task...">
      <button onclick="addTask()">Add</button>
    </div>
    <ul id="taskList"></ul>
  </div>

  <script>
    const taskInput = document.getElementById('taskInput');
    const taskList = document.getElementById('taskList');

    function addTask() {
      const taskText = taskInput.value.trim();
      if (taskText === '') {
        alert("Task can't be empty!");
        return;
      }

      const li = document.createElement('li');
      const span = document.createElement('span');
      span.textContent = taskText;

      const actions = document.createElement('div');
      actions.className = 'actions';

      const completeBtn = document.createElement('button');
      completeBtn.innerHTML = '✔️';
      completeBtn.onclick = () => {
        li.classList.toggle('completed');
      };

      const deleteBtn = document.createElement('button');
      deleteBtn.innerHTML = '🗑️';
      deleteBtn.onclick = () => {
        taskList.removeChild(li);
      };

      actions.appendChild(completeBtn);
      actions.appendChild(deleteBtn);

      li.appendChild(span);
      li.appendChild(actions);
      taskList.appendChild(li);

      taskInput.value = '';
    }

    // Allow "Enter" key to add task
    taskInput.addEventListener("keydown", function (e) {
      if (e.key === "Enter") addTask();
    });
  </script>

</body>
</html>
