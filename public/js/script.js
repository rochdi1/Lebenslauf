var app = new Vue({
    el: '#app',
    data: {
        message: 'Ich bin Abdel',
        experiences: [],
        formations: [],
        competences: [],
        projets: [],
        open: {
            experience: false,
            formation: false,
            competence: false,
            projet: false,
        },
        experience: {
            id= 0,
            cv_id: window.laravel.idExperience,
            titre: '',
            body: '',
            debur: '',
            fin: ''
        },
        formation: {
            id= 0,
            cv_id: window.laravel.idExperience,
            titre: '',
            description: ''         
        },
        competence: {
            id= 0,
            cv_id: window.laravel.idExperience,
            titre: '',
            description: ''       
        },
        projet: {
            id= 0,
            cv_id: window.laravel.idExperience,
            titre: '',
            description: ''
        },
        edit: {
            experience: false,
            formation: false,
            competence: false,
            projet: false
        }
       
    },
    methods: {
        getData: function() {
         axios.get(window.Laravel.url+'/getdata/'+window.Laravel.idExperience)
         .then(response => (
             this.experiences = response.data.experiences;
             this.formations = response.data.formations;
             this.competences = response.data.competences;
             this.projets = response.data.projets;
             ))
             .catch(error=>{
                 // handle error
             	console.log('error : ', error);
             })
         
        },
        addExperience: function() {
            
         axios.post(window.Laravel.url+'/addexperience', this.experience)
         .then(response => {
                 
                 if(response.data.etat){
                     this.open.experience= false;
                     this.experience.id = response.data.id;
                 //	this.experiences.push(this.experience);
                 this.experiences.unshift(this.experience);
                 this.experience= {
                     id: 0,
                     cv_id: window.Laravel.idExperience,
                     titre: '',
                     body: '',
                     debut: '',
                     fin: ''
                   }
                 }
             })
             .catch(error=>{
                 // handle error
             //	console.log(error);
             })
             
        },
        editExperience: function(experience) {
         this.open		= true;
         this.edit		= true;
         this.experience	= experience;
        },
        updateExperience: function() {
         axios.put(window.Laravel.url+'/updateexperience', this.experience)
         .then(response => {
                 
                 if(response.data.etat){
                     this.open= false;
             
                     this.experience= {
                         id: 0,
                         cv_id: window.Laravel.idExperience,
                         titre: '',
                         body: '',
                         debut: '',
                         fin: ''
                     }
                 }
                 this.edit= false;
             })
             .catch(error=>{
                 // handle error
             //	console.log(error);
             })
        },
        deleteExperience: function(experience) {
         swal({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
           }).then((result) => {
             if (result.value) {
                 axios.put(window.Laravel.url+'/deleteexperience/'+experience.id)
                 .then(response => {
                         
                         if(response.data.etat){
                             var position = this.experiences.indexOf(experience);
                             this.experiences.splice(position, 1);
                         }
                         
                     })
                     .catch(error=>{
                         // handle error
                     //	console.log(error);
                     })
               swal(
                 'Deleted!',
                 'Your file has been deleted.',
                 'success'
               )
             }
           })
            
        },
      
        // Formation

        addFormation: function() {
            
            axios.post(window.Laravel.url+'/addformation', this.experience)
            .then(response => {
                    
                    if(response.data.etat){
                        this.open.formation= false;
                        this.experience.id = response.data.id;
                    //	this.experiences.push(this.experience);
                    this.experiences.unshift(this.experience);
                    this.experience= {
                        id: 0,
                        cv_id: window.Laravel.idExperience,
                        titre: '',
                        body: '',
                        debut: '',
                        fin: ''
                      }
                    }
                })
                .catch(error=>{
                    // handle error
                //	console.log(error);
                })
                
           },
           editFormation: function(experience) {
            this.open.formation		= true;
            this.edit.formation		= true;
            this.experience	= experience;
           },
           updateFormation: function() {
            axios.put(window.Laravel.url+'/updateformation', this.experience)
            .then(response => {
                    
                    if(response.data.etat){
                        this.open.formation= false;
                
                        this.experience= {
                            id: 0,
                            cv_id: window.Laravel.idExperience,
                            titre: '',
                            body: '',
                            debut: '',
                            fin: ''
                        }
                    }
                    this.edit.formation= false;
                })
                .catch(error=>{
                    // handle error
                //	console.log(error);
                })
           },
           deleteFormation: function(experience) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.value) {
                    axios.put(window.Laravel.url+'/deleteformation/'+experience.id)
                    .then(response => {
                            
                            if(response.data.etat){
                                var position = this.experiences.indexOf(experience);
                                this.experiences.splice(position, 1);
                            }
                            
                        })
                        .catch(error=>{
                            // handle error
                        //	console.log(error);
                        })
                  swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
              })
               
           },

        // Competence
        addCompetence: function() {
            
            axios.post(window.Laravel.url+'/addcompetence', this.experience)
            .then(response => {
                    
                    if(response.data.etat){
                        this.open.competence= false;
                        this.experience.id = response.data.id;
                    //	this.experiences.push(this.experience);
                    this.experiences.unshift(this.experience);
                    this.experience= {
                        id: 0,
                        cv_id: window.Laravel.idExperience,
                        titre: '',
                        body: '',
                        debut: '',
                        fin: ''
                      }
                    }
                })
                .catch(error=>{
                    // handle error
                //	console.log(error);
                })
                
           },
           editCompetence: function(experience) {
            this.open.competence		= true;
            this.edit.competence		= true;
            this.experience	= experience;
           },
           updateCompetence: function() {
            axios.put(window.Laravel.url+'/updatecompetence', this.experience)
            .then(response => {
                    
                    if(response.data.etat){
                        this.open.competence= false;
                
                        this.experience= {
                            id: 0,
                            cv_id: window.Laravel.idExperience,
                            titre: '',
                            body: '',
                            debut: '',
                            fin: ''
                        }
                    }
                    this.edit.competence= false;
                })
                .catch(error=>{
                    // handle error
                //	console.log(error);
                })
           },
           deleteCompetence: function(experience) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.value) {
                    axios.put(window.Laravel.url+'/deletecompetence/'+experience.id)
                    .then(response => {
                            
                            if(response.data.etat){
                                var position = this.experiences.indexOf(experience);
                                this.experiences.splice(position, 1);
                            }
                            
                        })
                        .catch(error=>{
                            // handle error
                        //	console.log(error);
                        })
                  swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
              })
               
           },
        // Projet

        addProjet: function() {
            
            axios.post(window.Laravel.url+'/addprojet', this.experience)
            .then(response => {
                    
                    if(response.data.etat){
                        this.open.projet= false;
                        this.experience.id = response.data.id;
                    //	this.experiences.push(this.experience);
                    this.experiences.unshift(this.experience);
                    this.experience= {
                        id: 0,
                        cv_id: window.Laravel.idExperience,
                        titre: '',
                        body: '',
                        debut: '',
                        fin: ''
                      }
                    }
                })
                .catch(error=>{
                    // handle error
                //	console.log(error);
                })
                
           },
           editProjet: function(experience) {
            this.open.projet		= true;
            this.edit.projet		= true;
            this.experience	= experience;
           },
           updateProjet: function() {
            axios.put(window.Laravel.url+'/updateprojet', this.experience)
            .then(response => {
                    
                    if(response.data.etat){
                        this.open.projet= false;
                
                        this.experience= {
                            id: 0,
                            cv_id: window.Laravel.idExperience,
                            titre: '',
                            body: '',
                            debut: '',
                            fin: ''
                        }
                    }
                    this.edit.projet= false;
                })
                .catch(error=>{
                    // handle error
                //	console.log(error);
                })
           },
           deleteProjet: function(experience) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.value) {
                    axios.put(window.Laravel.url+'/deleteprojet/'+experience.id)
                    .then(response => {
                            
                            if(response.data.etat){
                                var position = this.experiences.indexOf(experience);
                                this.experiences.splice(position, 1);
                            }
                            
                        })
                        .catch(error=>{
                            // handle error
                        //	console.log(error);
                        })
                  swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
              })
               
           }
    },
    mounted:function() {
        this.getData();
    }
})

