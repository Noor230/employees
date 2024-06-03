// استعراض الموظفين عند تحميل الصفحة
window.onload = function() {
    fetchEmployees();
};

// استرجاع قائمة الموظفين من قاعدة البيانات
function fetchEmployees() {
    fetch('get_employees.php')
    .then(response => response.json())
    .then(data => {
        const employeeList = document.getElementById('employee-list');
        employeeList.innerHTML = '';
        data.forEach(employee => {
            const listItem = document.createElement('li');
            listItem.textContent = `${employee.name} - ${employee.email} - ${employee.position}`;
            employeeList.appendChild(listItem);
        });
    })
    .catch(error => console.error('Error:', error));
}

// إضافة موظف جديد
document.getElementById('add-employee-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    fetch('add_employee.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        fetchEmployees(); // تحديث قائمة الموظفين بعد الإضافة
    })
    .catch(error => console.error('Error:', error));
});
