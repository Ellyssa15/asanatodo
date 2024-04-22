@include('sidebar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/trash.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/task.css">
    <link rel="stylesheet" href="css/complete.css">
</head>

<body>
    <table
        style="margin: 0 auto; border-collapse: collapse; width: 99%; margin-top: 80px; font-weight: bold; font-size:20px;">
        <tr style="font-size: 20px;">
            <td style="border: 1px solid black; border-left: none; width: 36%; padding: 15px; text-align: left; ">Task
                Name</td>
            <td style="border: 1px solid black; padding: 15px; width: 33.3%; text-align: left;">Assignee
            </td>
            <td style="border: 1px solid black; border-right: none; padding: 15px; text-align: left;">Due Date</td>
        </tr>
    </table>


    <table id="tasks-todo" style="margin: 0 auto; border-collapse: collapse; width: 99%;">
        <tr
            style="border: 1px solid black; border-left: none; border-right: none; border-top: none; font-size: 20px; background-color:#eff4f8;">
            <td colspan="3" style="padding: 15px; text-align: left; font-weight: bold;">
                To-Do
            </td>
        </tr>
        @if (session('user')->role == 'user')
            @foreach ($tasks as $item)
                @if ($item->assignee == session('user')->name)
                    <tr style="font-size: 18px;">
                        <td
                            style="border: 1px solid black; border-left: none; padding: 15px; text-align: left; width: 36%;">
                            <section style="display: flex;">
                                <form action="{{ url('update_task', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="complete-button"
                                        style="background-color: transparent; border: none; position: absolute; left: 1%;">
                                        <span class="checkmark"
                                            style="color: {{ $item->status === 'Completed' ? 'black' : 'white' }};">&#10003;</span>
                                    </button>
                                </form>
                                <label style="margin-left: 8%;">{{ $item->name }}</label>
                            </section>
                        </td>
                        <td style="border: 1px solid black; padding: 15px; width:33.3%; text-align: left;">
                            <div style="display: flex; align-items: center; gap: 3px;">
                                <img
                                    src="https://ui-avatars.com/api/?name={{ $item->assignee }} & background=d6adff & rounded=true & bold=true & font-size=0.40 & size=35" />
                                {{ $item->assignee }}
                            </div>
                        </td>
                        <td
                            style="border: 1px solid black; border-right: none; padding: 15px; text-align: left; color:#FF0000;">
                            {{ $item->due_date }}
                        </td>

                    </tr>
                @endif
            @endforeach
    </table>

    <table id="tasks-completed" style="margin: 0 auto; border-collapse: collapse; width: 99%;">
        <tr
            style="border: 1px solid black; border-right: none; border-left: none; border-top: none; font-size: 20px; background-color:#eff4f8;">
            <td colspan="3" style="padding: 15px; text-align: left; font-weight: bold;">
                Completed</td>
        </tr>
        @foreach ($tasks as $item)
            @if ($item->status == 'Completed')
                <tr style="font-size: 18px;">
                    <td
                        style="border: 1px solid black; border-left: none; padding: 15px; text-align: left; width: 36%;">
                        {{ $item->name }}
                    </td>
                    <td style="border: 1px solid black; padding: 15px; text-align: left; width:33.3%;">
                        <div style="display: flex; align-items: center; gap: 3px;">
                            <img
                                src="https://ui-avatars.com/api/?name={{ $item->assignee }} & background=d6adff & rounded=true & bold=true & font-size=0.40 & size=35" />
                            {{ $item->assignee }}
                        </div>
                    </td>
                    <td
                        style="border: 1px solid black; border-right: none; padding: 15px; text-align: left; color:green;">
                        {{ \Carbon\Carbon::now()->format('d F Y') }}
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
    @endif
    @if (session('user')->role == 'admin')
        @foreach ($tasks as $item)
            <tr style="font-size: 18px;">
                <td style="border: 1px solid black; border-left: none; padding: 15px; text-align: left; width: 36%;">
                    <section style="display: flex;">
                        <div class="edit-task">
                            <span class="edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                    viewBox="0 0 64 64" style="margin-left: 440px; cursor: pointer;">
                                    <path fill="#ffce31" d="M7.934 41.132L39.828 9.246l14.918 14.922l-31.895 31.886z" />
                                    <path fill="#ed4c5c"
                                        d="m61.3 4.6l-1.9-1.9C55.8-.9 50-.9 46.3 2.7l-6.5 6.5l15 15l6.5-6.5c3.6-3.6 3.6-9.5 0-13.1" />
                                    <path fill="#93a2aa" d="m35.782 13.31l4.1-4.102l14.92 14.92l-4.1 4.101z" />
                                    <path fill="#c7d3d8" d="m37.338 14.865l4.1-4.101l11.739 11.738l-4.102 4.1z" />
                                    <path fill="#fed0ac" d="m7.9 41.1l-6.5 17l4.5 4.5l17-6.5z" />
                                    <path fill="#333" d="M.3 61.1c-.9 2.4.3 3.5 2.7 2.6l8.2-3.1l-7.7-7.7z" />
                                    <path fill="#ffdf85" d="m7.89 41.175l27.86-27.86l4.95 4.95l-27.86 27.86z" />
                                    <path fill="#ff8736" d="m17.904 51.142l27.86-27.86l4.95 4.95l-27.86 27.86z" />
                                </svg>
                            </span>
                        </div>
                        <label style="margin-left: -460px">{{ $item->name }}</label>
                        <form id="delete-form" action="{{ url('delete_task', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirmDelete()" class="trash-container"
                                style="background-color: transparent; border: none; position: absolute; left: 33%;">
                                <span class="trash" role="button">
                                    <span></span>
                                    <i></i>
                                </span>
                            </button>
                        </form>
                    </section>
                </td>
                <td style="border: 1px solid black; padding: 15px; width:33.3%; text-align: left;">
                    <div style="display: flex; align-items: center; gap: 3px;">
                        <img
                            src="https://ui-avatars.com/api/?name={{ $item->assignee }} & background=d6adff & rounded=true & bold=true & font-size=0.40 & size=35" />
                        {{ $item->assignee }}
                    </div>
                </td>
                <td
                    style="border: 1px solid black; border-right: none; padding: 15px; text-align: left; color:#FF0000;">
                    {{ $item->due_date }}
                </td>
            </tr>
        @endforeach
        </table>

        <table id="tasks-completed" style="margin: 0 auto; border-collapse: collapse; width: 99%;">
            <tr
                style="border: 1px solid black; border-right: none; border-left: none; border-top: none; font-size: 20px; background-color:#eff4f8;">
                <td colspan="3" style="padding: 15px; text-align: left; font-weight: bold;">
                    Completed</td>
            </tr>
            @foreach ($tasks as $item)
                @if ($item->status == 'Completed')
                    <tr style="font-size: 18px;">
                        <td
                            style="border: 1px solid black; border-left: none; padding: 15px; text-align: left; width: 36%;">
                            {{ $item->name }}
                        </td>
                        <td style="border: 1px solid black; padding: 15px; text-align: left; width:33.3%;">
                            <div style="display: flex; align-items: center; gap: 3px;">
                                <img
                                    src="https://ui-avatars.com/api/?name={{ $item->assignee }} & background=d6adff & rounded=true & bold=true & font-size=0.40 & size=35" />
                                {{ $item->assignee }}
                            </div>
                        </td>
                        <td
                            style="border: 1px solid black; border-right: none; padding: 15px; text-align: left; color:green;">
                            {{ \Carbon\Carbon::now()->format('d F Y') }}
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
        <div class="container">
            <a1 href="addtasks" class="button type--C" id="addTask">
                <div class="button__line"></div>
                <div class="button__line"></div>
                <span class="button__text">+ Add task</span>
            </a1>
        </div>
        <div id="addTaskModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-header"></div>
                <h2 style="background-color: #fff; padding:10px; ">Add new task</h2>
                <form action="{{ route('tasks.store') }}" method="post"
                    style="margin-left: 10px; margin-top:10px; ">
                    @csrf
                    <div class="assignee-container" style="margin-bottom: 20px;">
                        <label for="assignee">Assign task to:</label><br>
                        <select id="assignee" name="assignee">
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin-bottom: 20px;>
                <label for=" name">Task Name:</label><br>
                        <input type="text" style="width: 95%; height: 20px;" id="name" name="name"
                            required><br>
                    </div>
                    <div style="margin-bottom: 20px;>
                <label for=" due_date">Due Date:</label><br>
                        <input type="date" style="height: 20px;" id="due_date" name="due_date" required><br>
                    </div>
                    <div style="margin-top: 70px; display: flex; justify-content: center; ">
                        <button class="btncancel" role="button" onclick="closeModal()">Cancel</button>
                        <span style="margin:0 10px;"></span>
                        <button class="btnsave" role="button">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <script>
        document.querySelectorAll('.trash').forEach(trash => {
            trash.addEventListener('click', function() {
                const taskId = this.closest('tr').querySelector('input[type="checkbox"]').value;
                axios.delete(`/tasks/${taskId}`)
                    .then(response => {
                        this.closest('tr').remove();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            });
        });

        function confirmDelete() {
            if (confirm("Are you sure you want to delete this task?")) {
                document.getElementById("delete-form").submit();
            }
            return false;
        }

        document.getElementById('addTask').addEventListener('click', function() {
            document.getElementById('addTaskModal').style.display = 'block';
        });

        document.getElementsByClassName('close')[0].addEventListener('click', function() {
            document.getElementById('addTaskModal').style.display = 'none';
        });

        function closeModal() {
            document.getElementById('addTaskModal').style.display = 'none';
        }

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('addTaskModal')) {
                document.getElementById('addTaskModal').style.display = 'none';
            }
        });

        document.getElementById('addTaskForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('name').value;
            const due_date = document.getElementById('due_date').value;

            const task = {
                name: name,
                due_date: due_date,
                status: 'To-Do',
            };

            axios.get('/tasks')
                .then(response => {
                    const table = document.getElementById('tasks-todo');
                    response.data.forEach(task => {
                        const newRow = table.insertRow();
                        const cell1 = newRow.insertCell(0);
                        const cell2 = newRow.insertCell(1);
                        const cell3 = newRow.insertCell(2);

                        cell1.innerHTML = `
                            <section style="display: flex;">
                                  <input id="task-${task.id}" type="checkbox" name="r" value="${task.id}">
                                 <label for="task-${task.id}" style="z-index: 0;">${task.name}</label>
                                <span class="trash" style="margin-left: 77%; top: 10px;">
                                 <span></span>
                                   <i></i>
                                </span>
                           </section>
                     `;

                        cell2.innerHTML = `
                        <div style="display: flex; align-items: center; gap: 3px;">
                                    <img
                                        src="https://ui-avatars.com/api/?name=${assignee.name} &background=d6adff & rounded=true & bold=true & font-size=0.40 & size=35" />
                                    ${assignee.name}
                                </div>
                        `;

                        cell3.innerHTML = task.due_date;
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        });
    </script>
</body>

</html>
