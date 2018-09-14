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
									<button type="submit" class="  btn btn-primary form-control" v-on:click="addExperience">Hinzufügen</button>
								   </div>
					   
								 
					</div>	
					
					<ul class="list-group">
							

						<li class="list-group-item" v-for="exp in experiences">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm">Bearbeiten</button>
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
			}
		
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
			.then(response => console.log(response.data))
				.catch(error=>{
					// handle error
				//	console.log(error);
				})
				console.log('eee222');
		   } 
	   },
	   mounted:function() {
		   this.getExperiences();
	   }
	
	});

</script>

@endsection