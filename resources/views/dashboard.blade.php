@include('sidebar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <div class="nav" style="margin-left:90%; margin-top:1.5%;">
        <img src="https://ui-avatars.com/api/?name={{ session('user')->name }} & background=d6adff & rounded=true & bold=true & font-size=0.40 & size=50"
            style="padding-left: 50px; cursor: pointer;" onclick="toggleCard()">
    </div>
    <div class="card" id="user-card" style="width: 17%; margin-left: 82%;">
        <div class="card-body">
            <span class="close" onclick="closeModal()">&times;</span>
            <img src="https://ui-avatars.com/api/?name={{ session('user')->name }} & background=d6adff & rounded=true & bold=true & font-size=0.40 & size=125"
                style="padding-left: 50px;">
            <div class="mt-3"><br>
                <p style="text-align: left; font-size: 20px;">Name: {{ session('user')->name }}</p>
                <p style="text-align: left; font-size: 20px; text-wrap: nowrap;">Email: {{ session('user')->email }}</p>
                <div class="button-container">
                    <button onclick="window.location.href='notepad'" class="button">Notepad</button>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button href="/" id="logout-link"
                            onclick="return confirmLogout()"onclick="return confirmLogout()" style="width: 80px; height: 40px;">
                            Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:-2%;">
        <div class="heading">
            <h2 id="greeting-date" style="font-size: 25px"></h2>
            <h2 id="greeting" style="font-size: 50px"></h2>
        </div>
        @if (session('user')->role == 'admin')
            <div class="box-container" style="gap: 58px; margin-left: -3.5%; ">
                <div class="box box1">
                    <div class="text" style="margin-top:15px;">
                        <p class="topic">Completed task</p>
                        <p class="topic-heading">{{ $completedTasks }}</p>
                    </div>
                </div>


                <div class="box box3">
                    <div class="text" style="margin-top:15px;">
                        <p class="topic">Total task</p>
                        <p class="topic-heading">{{ $totalTasks }}</p>
                    </div>
                </div>
                <div class="box box2">
                    <div class="text" style="margin-top:15px;">
                        <p class="topic">Total staff</p>
                        <p class="topic-heading">{{ $incompleteTasks }}</p>
                    </div>
                </div>
            </div>
            <div class="box-container">
                <div class="box box4">
                    <p class="topic" style="margin-left: -5px; margin-top: -10px;">Task I've assigned</p>
                </div>
                <div class="box box4">
                    <div class="text">
                        <p class="topic" style="margin-left: -5px; margin-top: -10px;">My Staff</p>
                        <p class="topic-heading"></p>
                        <table style=" width: 99%; margin-top: 20px; font-size: 20px;">
                            <thead>
                                <tr>
                                    <th style="border: none;"></th>
                                    <th style="width: 150px; text-align:left; padding-left: 15px;"></th>
                                    <th style="width: 300px; text-align:left; padding-left: 12px;"> </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        @if (session('user')->role == 'user')
            <div class="box-container" style="gap: 58px; margin-left: -3.5%;">
                <div class="box box1">
                    <div class="text">
                        <p class="topic">Completed task</p>
                        <p class="topic-heading">{{ $completedTasks }}</p>
                    </div>
                </div>

                <div class="box box2">
                    <div class="text">
                        <p class="topic">Incomplete task</p>
                        <p class="topic-heading">{{ $incompleteTasks }}</p>
                    </div>
                </div>

                <div class="box box3">
                    <div class="text">
                        <p class="topic">Total task</p>
                        <p class="topic-heading">{{ $totalTasks }}</p>
                    </div>
                </div>
            </div>
            <div class="box-container">
                <div class="box box4">
                    <div class="text">
                        <p class="topic">My task</p>
                        <p class="topic-heading"></p>
                    </div>
                </div>
                <div class="box box4">
                    <div class="text">
                        <p class="topic">Total task by completion status</p>
                        <p class="topic-heading"></p>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="popup-box">
        <div class="popup">
            <div class="content">
                <header>
                    <p></p>
                    <i class="uil uil-times"></i>
                </header>
                <form action="#">
                    <div class="row title">
                        <label>Title</label>
                        <input type="text" spellcheck="false">
                    </div>
                    <div class="row description">
                        <label>Description</label>
                        <textarea spellcheck="false"></textarea>
                    </div>
                    <button></button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function closeModal() {
            document.getElementById('user-card').style.display = 'none';
        }

        const greetingDateElement = document.getElementById("greeting-date");
        const greetingElement = document.getElementById("greeting");

        const currentTime = new Date();
        const hours = currentTime.getHours();
        const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
            "November", "December"
        ];
        const day = days[currentTime.getDay()];
        const month = months[currentTime.getMonth()];
        const date = currentTime.getDate();

        if (hours < 12) {
            greetingDateElement.textContent = `${day}, ${month} ${date}`;
            greetingElement.textContent = `Good morning, {{ session('user')->name }}!`;
        } else if (hours < 18) {
            greetingDateElement.textContent = `${day}, ${month} ${date}`;
            greetingElement.textContent = `Good afternoon, {{ session('user')->name }}!`;
        } else {
            greetingDateElement.textContent = `${day}, ${month} ${date}`;
            greetingElement.textContent = `Good evening, {{ session('user')->name }}!`;
        }

        function toggleCard() {
            const card = document.getElementById("user-card");
            if (card.style.display === "none") {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const card = document.getElementById("user-card");
            card.style.display = "none";
        });

        //note
        const addBox = document.querySelector(".add-box"),
            popupBox = document.querySelector(".popup-box"),
            popupTitle = popupBox.querySelector("header p"),
            closeIcon = popupBox.querySelector("header i"),
            titleTag = popupBox.querySelector("input"),
            descTag = popupBox.querySelector("textarea"),
            addBtn = popupBox.querySelector("button");


        const notes = JSON.parse(localStorage.getItem("notes") || "[]");
        let isUpdate = false,
            updateId;

        addBox.addEventListener("click", () => {
            popupTitle.innerText = "Add a new Note";
            addBtn.innerText = "Add Note";
            popupBox.classList.add("show");
            document.querySelector("body").style.overflow = "hidden";
            if (window.innerWidth > 660) titleTag.focus();
        });

        closeIcon.addEventListener("click", () => {
            isUpdate = false;
            titleTag.value = descTag.value = "";
            popupBox.classList.remove("show");
            document.querySelector("body").style.overflow = "auto";
        });

        function showNotes() {
            if (!notes) return;
            document.querySelectorAll(".note").forEach(li => li.remove());
            notes.forEach((note, id) => {
                let filterDesc = note.description.replaceAll("\n", '<br/>');
                let liTag = `<li class="note">
                        <div class="details">
                            <p>${note.title}</p>
                            <span>${filterDesc}</span>
                        </div>
                        <div class="bottom-content">
                            <span>${note.date}</span>
                            <div class="settings">
                                <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>
                                <ul class="menu">
                                    <li onclick="updateNote(${id}, '${note.title}', '${filterDesc}')"><i class="uil uil-pen"></i>Edit</li>
                                    <li onclick="deleteNote(${id})"><i class="uil uil-trash"></i>Delete</li>
                                </ul>
                            </div>
                        </div>
                    </li>`;
                addBox.insertAdjacentHTML("afterend", liTag);
            });
        }
        showNotes();

        function showMenu(elem) {
            elem.parentElement.classList.add("show");
            document.addEventListener("click", e => {
                if (e.target.tagName != "I" || e.target != elem) {
                    elem.parentElement.classList.remove("show");
                }
            });
        }

        function deleteNote(noteId) {
            let confirmDel = confirm("Are you sure you want to delete this note?");
            if (!confirmDel) return;
            notes.splice(noteId, 1);
            localStorage.setItem("notes", JSON.stringify(notes));
            showNotes();
        }

        function updateNote(noteId, title, filterDesc) {
            let description = filterDesc.replaceAll('<br/>', '\r\n');
            updateId = noteId;
            isUpdate = true;
            addBox.click();
            titleTag.value = title;
            descTag.value = description;
            popupTitle.innerText = "Update a Note";
            addBtn.innerText = "Update Note";
        }

        addBtn.addEventListener("click", e => {
            e.preventDefault();
            let title = titleTag.value.trim(),
                description = descTag.value.trim();

            if (title || description) {
                let currentDate = new Date(),
                    month = months[currentDate.getMonth()],
                    day = currentDate.getDate(),
                    year = currentDate.getFullYear();

                let noteInfo = {
                    title,
                    description,
                    date: `${month} ${day}, ${year}`
                }
                if (!isUpdate) {
                    notes.push(noteInfo);
                } else {
                    isUpdate = false;
                    notes[updateId] = noteInfo;
                }
                localStorage.setItem("notes", JSON.stringify(notes));
                showNotes();
                closeIcon.click();
            }
        });
    </script>
</body>

</html>
