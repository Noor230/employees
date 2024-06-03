// تحديث بيانات الموظف
document.getElementById('update-employee-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    fetch('update_employee.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        fetchEmployees(); // تحديث قائمة الموظفين بعد التحديث
    })
    .catch(error => console.error('Error:', error));
});
