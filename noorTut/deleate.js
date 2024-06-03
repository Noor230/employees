// تعريف دالة لحذف الموظف
function deleteEmployee(id) {
    fetch('delete_employee.php', {
        method: 'POST',
        body: JSON.stringify({id: id}),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        // إعادة تحميل الصفحة بعد حذف الموظف لتحديث القائمة
        location.reload();
    })
    .catch(error => console.error('Error:', error));
}
