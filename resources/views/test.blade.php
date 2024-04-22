@include('sidebar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Test Page</title>
</head>

<body style="margin-top: 6%; margin-left: 13%;">
    <div class="container">
        <!-- Create Note Button -->
        <div class="wrapper" style=" display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px;">
            <li class="add-box" onclick="showAddModal()">
                <div class="icon" style="color:black;"><i class="uil uil-plus" style="color:black;"></i></div>
                <button class="btn" style="border: none; background: none;">Create Note</button>
            </li>


        <!-- Note List -->
            <ul id="note-list" style=" position: relative; box-sizing: border-box;">
                @foreach ($notepads as $notepad)
                    <li class="note">
                        <div class="details">
                            <p>{{ $notepad->title }}</p>
                            <span>{{ $notepad->description }}</span>
                        </div>
                        <div class="bottom-content">
                            <span>Created by:{{ $notepad->name }}</span>
                            <div style="display: flex;">
                                <span>{{ $notepad->date }}</span>
                                <div class="settings">
                                    <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>
                                    <ul class="menu">
                                        <li class="btn" onclick="showEditModal({{ $notepad->id }})">
                                            <i class="uil uil-pen"></i>Edit
                                        </li>
                                        <li>
                                            <form action="{{ route('test.destroy', $notepad->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div style="display: flex; align-items: center;">
                                                    <i class="uil uil-trash"></i>
                                                    <button type="submit" class="btn"
                                                        style="background: none; color:#000;">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <br><br>
                @endforeach
            </ul>
        </div>
    </div>
    <br><br><br>
    <!-- Add Modal -->
    <div id="add-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add a new note</h2>
                <span class="close" onclick="closeModal()" style="cursor: pointer; font-size: 28px; color: #6D6D6D; font-weight: 500;">&times;</span>
            </div>
            <form action="{{ route('test.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btnsave">Create Note</button>
                </div>
            </form>
        </div>
    </div>
    <br><br><br>

    <!-- Edit Modal -->
    @foreach ($notepads as $notepad)
        <div id="edit-modal-{{ $notepad->id }}" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit note</h4>
                    <span class="close" onclick="closeModal()" style="cursor: pointer;">&times;</span>
                </div>
                <form action="{{ route('test.update', $notepad->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" value="{{ $notepad->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" required>{{ $notepad->description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btncancel" role="button" onclick="closeModal()">Cancel</button>
                        <button type="submit" class="btnsave">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    </div>

    <script>
        function showAddModal() {
            document.getElementById('add-modal').style.display = 'block';
        }

        document.getElementById('modal').addEventListener('click', function(event) {
            if (event.target === document.getElementById('add-modal')) {
                closeModal();
            }
        });

        function closeModal() {
            document.getElementById('add-modal').style.display = 'none';
            document.querySelectorAll('.edit-modal').forEach(modal => modal.style.display = 'none');
        }

        function showEditModal(id) {
            document.getElementById('edit-modal-' + id).style.display = 'block';
        }

        function deleteNote(id) {
            if (confirm("Are you sure you want to delete this note?")) {
                axios.delete(`{{ route('test.destroy', ':id') }}`, {
                        params: {
                            id: id
                        }
                    })
                    .then(response => {
                        location.reload();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }

        function showMenu(elem) {
            elem.parentElement.classList.add("show");
            document.addEventListener("click", e => {
                if (e.target.tagName != "I" || e.target != elem) {
                    elem.parentElement.classList.remove("show");
                }
            });
        }
    </script>
</body>

</html>
