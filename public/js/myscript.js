var app = new Vue({
  el: '#app',
  data: {
    message: 'Ich bin Rochdi',
    projects: [],
    portfolios: [],
    kompetenenzes: [],
    ausbildungs: [],
    experiences: [],
    errors: [],
    openexp: false,
    openaus: false,
    openpor: false,
    openpro: false,
    openKomp: false,
    isOpen: false,
    experience: {
      id: 0,
      cv_id: window.Laravel.idExperience,
      titre: '',
      body: '',
      debut: '',
      fin: ''
    },
    ausbildung: {
        id: 0,
        cv_id: window.Laravel.idExperience,
        titre: '',
        description: '',
        lien: '',
        image: ''
      },
    project: {
      id: 0,
      cv_id: window.Laravel.idExperience,
      titre: '',
      description: '',
      debut: '',
      fin: ''
    },
    kompetenenz: {
      id: 0,
      cv_id: window.Laravel.idExperience,
      titre: '',
      description: '',
      debut: '',
      fin: ''
    },

    portfolio: {
      id: 0,
      cv_id: window.Laravel.idExperience,
      titre: '',
      description: '',
      debut: '',
      fin: ''
    },
    editexp: false,
    editaus: false,
    editpor: false,
    editpro: false,
    editKomp: false,

  },
  methods: {
    getData: function() {
      console.log('getData');
      //	axios.get('http://127.0.0.1:8000/getexperiences')
      axios.get(window.Laravel.url + '/getdata/' + window.Laravel.idExperience)
        .then(response => {
          this.experiences = response.data.experiences;
          this.projects = response.data.projects;
          this.kompetenenzes = response.data.kompetenenzes;
          this.ausbildungs = response.data.formations;

        })
        .catch(error => {
          // handle error
          //	console.log(error);
        })

    },
    addExperience: function() {
      console.log('addExperience');
      axios.post(window.Laravel.url + '/addexperience', this.experience)
        .then(response => {
          if (response.data.etat) {
            this.openexp = false;
            this.experience.id = response.data.id;
            //	this.experiences.push(this.experience);
            this.experiences.unshift(this.experience);
            this.experience = {
              id: 0,
              cv_id: window.Laravel.idExperience,
              titre: '',
              body: '',
              debut: '',
              fin: ''
            }
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;

     });

    }, 
    editExperience: function(experience) {
      console.log('editExperience');
      this.openexp = true;
      this.editexp = true;
      this.experience = experience;
      console.log('offnen');
    },
    updateExperience: function() {
      console.log('updateExperience');

      axios.put(window.Laravel.url + '/updateexperience', this.experience)
        .then(response => {
          console.log(response.data.etat);
          if (response.data.etat) {

            this.openexp = false;

            this.experience = {
              id: 0,
              cv_id: window.Laravel.idExperience,
              titre: '',
              body: '',
              debut: '',
              fin: ''
            }
          }
          this.editexp = false;
        })
        .catch(error => {
          // handle error
          //	console.log(error);
        })
    },
    deleteExperience: function(experience) {
      console.log('deleteExperience');
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
          axios.put(window.Laravel.url + '/deleteexperience/' + experience.id)
            .then(response => {

              if (response.data.etat) {
                var position = this.experiences.indexOf(experience);
                this.experiences.splice(position, 1);
              }

            })
            .catch(error => {
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
    addAusbildung: function() {
        
      console.log('addAusbildung2');

      axios.post(window.Laravel.url + '/addausbildung', this.ausbildung)
        .then(response => {
          if (response.data.etat) {
            this.openaus = false;
            this.ausbildung.id = response.data.id;
            this.ausbildungs.unshift(this.ausbildung);
            this.ausbildung = {
              id: 0,
              cv_id: window.Laravel.idExperience,
              titre: '',
              description: '',
              lien: 'uuuuuuuu',
              image: 'uuuuuuuuuuu'
            }
          }
        })
        .catch(error => {
          // handle error
          //	console.log(error);
        })

    },
    editAusbildung: function(ausbildung) {
      console.log('editAusbildung');
      this.openaus = true;
      this.editaus = true;
      this.ausbildung = ausbildung;
      console.log('offnen');
    },
    updateAusbildung: function() {
      console.log('updateAusbildung');

      axios.put(window.Laravel.url + '/updateausbildung', this.ausbildung)
        .then(response => {

          if (response.data.etat) {

            this.openaus = false;

            this.ausbildung = {
              id: 0,
              cv_id: window.Laravel.idExperience,
              titre: '',
              description: '',
              lien: '',
              image: ''
            }
          }
          this.editaus = false;
        })
        .catch(error => {
          // handle error
          //	console.log(error);
        })
    },

    deleteAusbildung: function(ausbildung) {
      console.log('deleteausbildung');
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
          axios.put(window.Laravel.url + '/deleteausbildung/' + ausbildung.id)
            .then(response => {

              if (response.data.etat) {
                var position = this.ausbildungs.indexOf(ausbildung);
                this.ausbildungs.splice(position, 1);
              }

            })
            .catch(error => {
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

    // Kompetenenz
    addKompetenenz: function() {
      console.log('addkompetenenz');
      axios.post(window.Laravel.url + '/addkompetenenz', this.kompetenenz)
        .then(response => {

          if (response.data.etat) {
            this.openKomp = false;
            this.kompetenenz.id = response.data.id;
            //	this.experiences.push(this.experience);
            this.kompetenenzes.unshift(this.experience);
            this.kompetenenz = {
              id: 0,
              cv_id: window.Laravel.idExperience,
              titre: '',
              description: '',
              debut: '',
              fin: ''
            }
          }
        })
        .catch(error => {
          // handle error
          //	console.log(error);
        })

    },
    editKompetenenz: function(kompetenenz) {
      console.log('editKompetenenz');
      this.openKomp = true;
      this.editKomp = true;
      this.kompetenenz = kompetenenz;
      console.log('offnen');
    },
    updateKompetenenz: function() {
      console.log('updatekompetenenz');
      axios.put(window.Laravel.url + '/updatekompetenenz', this.kompetenenz)
        .then(response => {

          if (response.data.etat) {

            this.openKomp = false;

            this.kompetenenz = {
              id: 0,
              cv_id: window.Laravel.idExperience,
              titre: '',
              description: '',
              debut: '',
              fin: ''
            }
          }
          this.editKomp = false;
        })
        .catch(error => {
          // handle error
          //	console.log(error);
        })
    },
    deleteKompetenenz: function(kompetenenz) {
      console.log('deleteExperience');
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
          axios.put(window.Laravel.url + '/deletekompetenenz/' + kompetenenz.id)
            .then(response => {

              if (response.data.etat) {
                var position = this.kompetenenzes.indexOf(kompetenenz);
                this.kompetenenzes.splice(position, 1);
              }

            })
            .catch(error => {
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

    //Portfolio portfolio

    addPortfolio: function() {
      console.log('addportfolio');
      axios.post(window.Laravel.url + '/addportfolio', this.portfolio)
        .then(response => {

          if (response.data.etat) {
            this.openpor = false;
            this.portfolio.id = response.data.id;
            //	this.experiences.push(this.experience);
            this.portfolios.unshift(this.portfolio);
            this.portfolio = {
              id: 0,
              cv_id: window.Laravel.idExperience,
              titre: '',
              description: '',
              debut: '',
              fin: ''
            }
          }
        })
        .catch(error => {
          // handle error
          //	console.log(error);
        })

    },
    editPortfolio: function(portfolio) {
      console.log('editPortfolio');
      this.openpor = true;
      this.editpor = true;
      this.portfolio = portfolio;
      console.log('offnen');
    },
    updatePortfolio: function() {
      console.log('updateExperience');
      axios.put(window.Laravel.url + '/updateportfolio', this.portfolio)
        .then(response => {

          if (response.data.etat) {

            this.openpor = false;

            this.portfolio = {
              id: 0,
              cv_id: window.Laravel.idExperience,
              titre: '',
              description: '',
              debut: '',
              fin: ''
            }
          }
          this.editpor = false;
        })
        .catch(error => {
          // handle error
          //	console.log(error);
        })
    },
    deletePortfolio: function(portfolio) {
      console.log('deleteportfolio');
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
          axios.put(window.Laravel.url + '/deleteportfolio/' + portfolio.id)
            .then(response => {

              if (response.data.etat) {
                var position = this.portfolios.indexOf(portfolio);
                this.portfolios.splice(position, 1);
              }

            })
            .catch(error => {
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

    //Project project

    addProject: function() {
      console.log('addproject');
      axios.post(window.Laravel.url + '/addproject', this.project)
        .then(response => {

          if (response.data.etat) {
            this.openpro = false;
            this.project.id = response.data.id;
            //	this.experiences.push(this.experience);
            this.projects.unshift(this.project);
            this.project = {
              id: 0,
              cv_id: window.Laravel.idExperience,
              titre: '',
              description: '',
              debut: '',
              fin: ''
            }
          }
        })
        .catch(error => {
          // handle error
          //	console.log(error);
        })

    },
    editProject: function(project) {
      console.log('editProject');
      this.openpro = true;
      this.editpro = true;
      this.project = project;
      console.log('offnen');
    },
    updateProject: function() {
      console.log('updateproject');
      axios.put(window.Laravel.url + '/updateproject', this.project)
        .then(response => {

          if (response.data.etat) {

            this.openpro = false;

            this.project = {
              id: 0,
              cv_id: window.Laravel.idExperience,
              titre: '',
              description: '',
              debut: '',
              fin: ''
            }
          }
          this.editpro = false;
        })
        .catch(error => {
          // handle error
          //	console.log(error);
        })
    },
    deleteProject: function(project) {
      console.log('deleteproject');
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
          axios.put(window.Laravel.url + '/deleteproject/' + project.id)
            .then(response => {

              if (response.data.etat) {
                var position = this.projects.indexOf(project);
                this.projects.splice(position, 1);
              }

            })
            .catch(error => {
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
  mounted: function() {
    this.getData();



  }

});