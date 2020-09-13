var app = new Vue({
el: '#members',
        data:{
        showAddModal: false,
                showEditModal: false,
                showDeleteModal: false,
                errorMessage: "",
                successMessage: "",
                members: [],
                newMember: {firstname: '', lastname: ''},
                clickMember: {}
        },
        mounted: function(){
        this.getAllMembers();
        },
        methods:{
        getAllMembers: function(){
        axios.get('api.php')
                .then(function(response){
                //console.log(response);
                if (response.data.error){
                app.errorMessage = response.data.message;
                }
                else{
                app.members = response.data.members;
                }
                });
        },
                saveMember: function(){
                //console.log(app.newMember);
                var memForm = app.toFormData(app.newMember);
                        axios.post('api.php?crud=create', memForm)
                        .then(function(response){
                        //console.log(response);
                        app.newMember = {firstname: '', lastname:''};
                                if (response.data.error){
                        app.errorMessage = response.data.message;
                        }
                        else{
                        app.successMessage = response.data.message
                                app.getAllMembers();
                        }
                        });
                },
                updateMember(){
        var memForm = app.toFormData(app.clickMember);
                axios.post('api.php?crud=update', memForm)
                .then(function(response){
                //console.log(response);
                app.clickMember = {};
                        if (response.data.error){
                app.errorMessage = response.data.message;
                }
                else{
                app.successMessage = response.data.message
                        app.getAllMembers();
                }
                });
        },
                deleteMember(){
        var memForm = app.toFormData(app.clickMember);
                axios.post('api.php?crud=delete', memForm)
                .then(function(response){
                //console.log(response);
                app.clickMember = {};
                        if (response.data.error){
                app.errorMessage = response.data.message;
                }
                else{
                app.successMessage = response.data.message
                        app.getAllMembers();
                }
                });
        },
                selectMember(member){
        app.clickMember = member;
        },
                toFormData: function(obj){
                var form_data = new FormData();
                        for (var key in obj){
                form_data.append(key, obj[key]);
                }
                return form_data;
                },
                clearMessage: function(){
                app.errorMessage = '';
                        app.successMessage = '';
                }

        }
});