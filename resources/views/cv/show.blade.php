@extends('layouts.app')


@section('content')

<div class="container" id="app">
	<div class="row">
		<div class="col-md-12">
			
          <!-- on ecrit @ et apre le variable parsquil vue js et blade il ont les meme technique -->
			<h1>@{{ message }}</h1>
		
			
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10"><h3 class="panel-title">Erfahrung</h3></div>
						<div class="col-md-2 text-right">			
						<!--	<a href="{{ url('experience/1') }}" class="btn btn-success">Hinzufügen</a> -->
							<button type="submit"  class="btn btn-primary form-control" v-on:click="open = true">Hinzufügen</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					<div v-if="open">
					
					   
								   <div class="form-group">
									<label for="titre">Titel</label>
									<input type="text" name="titre" class="form-control" v-model="experience.titre">
								   </div>
								   <div class="form-group">
										<label for="body">Body</label>
										<input type="text" name="body" class="form-control" v-model="experience.body">
									   </div>
					   
								   <div class="form-group">
									<label for="debut">Anfangsdatum</label>
									<input type="date" name="debut" class="form-control" v-model="experience.debut">
								   </div>
					   
								   <div class="form-group">
									<label for="fin">Enddatum</label>
									<input type="date" name="fin" class="form-control" v-model="experience.fin">
								   </div>
					   
								   <div class="form-group">	
									<button v-if="edit" type="submit" class="  btn btn-danger form-control" v-on:click="updateExperience">Update</button>
		 
									<button v-else type="submit" class="  btn btn-primary form-control" v-on:click="addExperience">Hinzufügen</button>
   
								</div>
					   
								 
					</div>	
					
					<ul class="list-group">
							

						<li class="list-group-item" v-for="exp in experiences">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm" v-on:click="editExperience(exp)">Bearbeiten</button>
								<button class="btn btn-danger btn-sm" v-on:click="deleteExperience(exp)">Löschen</button>
							</div>
							<h3>@{{ exp.titre }}</h3>
							<p>@{{ exp.body }}</p>
							<small>@{{ exp.debut }} - @{{ exp.fin }}</small>
						</li>
					</ul>

				</div>
			</div>

			<hr>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10"><h3 class="panel-title">Ausbildung</h3></div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success">Hinzufügen</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi natus veritatis consequatur, voluptates, expedita tempore rem illum magni ipsum repudiandae.
				</div>
			</div>

			<hr>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10"><h3 class="panel-title">Portefolio</h3></div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success">Hinzufügen</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi natus veritatis consequatur, voluptates, expedita tempore rem illum magni ipsum repudiandae.
				</div>
			</div>

			<hr>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10"><h3 class="panel-title">Kompetenz</h3></div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success">Hinzufügen</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi natus veritatis consequatur, voluptates, expedita tempore rem illum magni ipsum repudiandae.
				</div>
			</div>
		  
		</div>
	</div>
</div>

@endsection


@section('javascripts')


<script src="{{ asset('js/vue.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
        window.Laravel = {!! json_encode([
			'csrfToken'		 => csrf_token(),
			'idExperience' 	 => $id,
			'url'			=>url('/')
  
        ]) !!};
</script>
<script>


	var app = new Vue({
       el: '#app',
       data: {
			message: 'Ich bin Rochdi',
			experiences: {},
			open:false,
			experience: {
				id: 0,
				cv_id: window.Laravel.idExperience,
				titre: '',
				body: '',
				debut: '',
				fin: ''
			},
			edit:false
		
	   },
	   methods: {
		   getExperiences: function() {
		//	axios.get('http://127.0.0.1:8000/getexperiences')
			axios.get(window.Laravel.url+'/getexperiences/'+window.Laravel.idExperience)
			.then(response => (this.experiences = response.data))
				.catch(error=>{
					// handle error
				//	console.log(error);
				})
			
		   },
		   addExperience: function() {
			   
			axios.post(window.Laravel.url+'/addexperience', this.experience)
			.then(response => {
					
					if(response.data.etat){
						this.open= false;
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
			


				console.log('delete');
				
		   }
		 
	   },
	   mounted:function() {
		   this.getExperiences();
	   }
	
	});

</script>

@endsection