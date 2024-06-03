
//سنقوم بتحديث ملف JavaScript (manage_employees.js) لإضافة وظيفة حذف الموظف:
// حذف موظف
document.getElementById('delete-employee-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    fetch('delete_employee.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        fetchEmployees(); // تحديث قائمة الموظفين بعد الحذف
    })
    .catch(error => console.error('Error:', error));
});
