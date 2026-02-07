document.addEventListener('DOMContentLoaded', function () {
        const formField = document.getElementById('formfield');
        const addButton = document.getElementById('addButton');
        const removeButton = document.getElementById('removeButton');

        addButton.addEventListener('click', function () {
            const newRow = document.createElement('div');
            newRow.className = 'row justify-content-center mb-4';

            const nameCol = document.createElement('div');
            nameCol.className = 'col-6 ';
            const nameInput = document.createElement('input');
            nameInput.className = 'form-control form-control-lg';
            nameInput.type = 'text';
            nameInput.placeholder = 'รายการจ่าย';
            nameCol.appendChild(nameInput);

            const payCol = document.createElement('div');
            payCol.className = 'col-6 ';
            const payInput = document.createElement('input');
            payInput.className = 'form-control form-control-lg';
            payInput.type = 'number';
            payInput.placeholder = 'ค่าใช้จ่าย';
            payCol.appendChild(payInput);
 
            newRow.appendChild(nameCol);
            newRow.appendChild(payCol);
    
            formField.appendChild(newRow);

        });
    
            removeButton.addEventListener('click', function () {
            const rows = formField.getElementsByClassName('row');
            if (rows.length > 1) {
                formField.removeChild(rows[rows.length - 1]);
                }
                
        });
    });



    // Add Gas
    const btn100 = document.getElementById('btn_100');
    const btn500 = document.getElementById('btn_500');
    const btn1000 = document.getElementById('btn_1000');

    btn100.addEventListener('click', () => {
        addToDatabase(100);
    });

    btn500.addEventListener('click', () => {
        addToDatabase(500);
    });

    btn1000.addEventListener('click', () => {
        addToDatabase(1000);
    });

    function addToDatabase(value) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_to_database.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log('Data added to database successfully');
                } else {
                    console.error('Failed to add data to database');
                }
            }
        };
        const data = `value=${value}`;
        xhr.send(data);
    }