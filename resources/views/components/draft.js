
    let data={
    search: '',
    employees: {{$employees}},
    get filteredEmployee(){
        return this.employees.filter(i => i.firstname.toLowerCase().startsWith(this.search.toLowerCase())
        )
    }, // Added a comma here 

    deleteEmployee(id) {
        if (confirm('Are you sure you want to delete this employee?')) {
            // Implement the AJAX call to your Laravel backend here
            fetch(`/employees/${id}`, {
                method: 'DELETE',
                headers: {
                   'X-CSRF-TOKEN': $('meta[name=`csrf-token`]').attr('content')
                }
            })
            .then(() => {
                // Remove the deleted employee from the employees array
                const index = this.employees.findIndex(e => e.id === id);
                this.employees.splice(index, 1); 
            })
            .catch(error => {
                // Handle any errors that occur during deletion 
                console.error('Error deleting employee:', error); 
            });
        }
    }
}
