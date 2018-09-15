@extends('layouts.appwithoutappjs')


@section('content')

<div class="container" id="app">
	<div class="row">
		<div class="col-md-12">
			
          <!-- on ecrit @ et apre le variable parsquil vue js et blade il ont les meme technique -->
			<h1>@{{ message }}</h1>
		
			<!--  Experience  -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10"><h3 class="panel-title">Erfahrung</h3></div>
						<div class="col-md-2 text-right">			
						<!--	<a href="{{ url('experience/1') }}" class="btn btn-success">Hinzufügen</a> -->
							<button type="submit"  class="btn btn-primary form-control" v-on:click="openexp = true">Hinzufügen</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					<div v-if="openexp">
					
					   
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
									<button v-if="editexp" type="submit" class="  btn btn-danger form-control" v-on:click="updateExperience">Update</button>
		 
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
			<!--  Ausbildung  -->
				
			<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10"><h3 class="panel-title">Ausbildung</h3></div>
							<div class="col-md-2 text-right">			
							<!--	<a href="{{ url('experience/1') }}" class="btn btn-success">Hinzufügen</a> -->
								<button type="submit"  class="btn btn-primary form-control" v-on:click="openaus = true">Hinzufügen</button>
							</div>
						</div>
						
					</div>
					<div class="panel-body">
						<div v-if="openaus">
						
						   
									   <div class="form-group">
										<label for="titre">Titel</label>
										<input type="text" name="titre" class="form-control" v-model="ausbildung.titre">
									   </div>
									   <div class="form-group">
											<label for="description">Description</label>
											<input type="text" name="description" class="form-control" v-model="ausbildung.description">
										   </div>
						   
									   <div class="form-group">
										<label for="debut">Anfangsdatum</label>
										<input type="date" name="debut" class="form-control" v-model="ausbildung.debut">
									   </div>
						   
									   <div class="form-group">
										<label for="fin">Enddatum</label>
										<input type="date" name="fin" class="form-control" v-model="ausbildung.fin">
									   </div>
						   
									   <div class="form-group">	
										<button v-if="editaus" type="submit" class="  btn btn-danger form-control" v-on:click="updateAusbildung">Update</button>
			 
										<button v-else type="submit" class="  btn btn-primary form-control" v-on:click="addAusbildung">Hinzufügen</button>
	   
									</div>
						   
									 
						</div>	
						
						<ul class="list-group">
								
	
							<li class="list-group-item" v-for="exp in ausbildungs">
								<div class="pull-right">
									<button class="btn btn-warning btn-sm" v-on:click="editAusbildung(exp)">Bearbeiten</button>
									<button class="btn btn-danger btn-sm" v-on:click="deleteAusbildung(exp)">Löschen</button>
								</div>
								<h3>@{{ exp.titre }}</h3>
								<p>@{{ exp.description }}</p>
								<small>@{{ exp.debut }} - @{{ exp.fin }}</small>
							</li>
						</ul>
	
					</div>
				</div>

			<hr>
			
			
			<!--  Project  -->
			<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10"><h3 class="panel-title">Project</h3></div>
							<div class="col-md-2 text-right">			
								<button type="submit"  class="btn btn-primary form-control" v-on:click="openpro = true">Hinzufügen</button>
							</div>
						</div>	
					</div>
					<div class="panel-body">
						<div v-if="openpro">
									   <div class="form-group">
										<label for="titre">Titel</label>
										<input type="text" name="titre" class="form-control" v-model="project.titre">
									   </div>
									   <div class="form-group">
											<label for="description">Description</label>
											<input type="text" name="body" class="form-control" v-model="project.description">
										   </div>
						   
									   <div class="form-group">
										<label for="debut">Anfangsdatum</label>
										<input type="date" name="debut" class="form-control" v-model="project.debut">
									   </div>
						   
									   <div class="form-group">
										<label for="fin">Enddatum</label>
										<input type="date" name="fin" class="form-control" v-model="project.fin">
									   </div>
						   
									   <div class="form-group">	
										<button v-if="editpro" type="submit" class="  btn btn-danger form-control" v-on:click="updateProject">Update</button>
			 
										<button v-else type="submit" class="  btn btn-primary form-control" v-on:click="addProject">Hinzufügen</button>
	   
									</div>
						   
									 
						</div>	
						
						<ul class="list-group">
							<li class="list-group-item" v-for="exp in projects">
								<div class="pull-right">
									<button class="btn btn-warning btn-sm" v-on:click="editProject(exp)">Bearbeiten</button>
									<button class="btn btn-danger btn-sm" v-on:click="deleteProject(exp)">Löschen</button>
								</div>
								<h3>@{{ exp.titre }}</h3>
								<p>@{{ exp.description }}</p>
								<small>@{{ exp.debut }} - @{{ exp.fin }}</small>
							</li>
						</ul>
	
					</div>
			</div>
	
			<hr>

			
				<!--  Portfolio  -->
			<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10"><h3 class="panel-title">Portefolio</h3></div>
							<div class="col-md-2 text-right">			
							<!--	<a href="{{ url('experience/1') }}" class="btn btn-success">Hinzufügen</a> -->
								<button type="submit"  class="btn btn-primary form-control" v-on:click="openpor = true">Hinzufügen</button>
							</div>
						</div>
						
					</div>
					<div class="panel-body">
						<div v-if="openpor">
						
						   
									   <div class="form-group">
										<label for="titre">Titel</label>
										<input type="text" name="titre" class="form-control" v-model="portfolio.titre">
									   </div>
									   <div class="form-group">
											<label for="description">description</label>
											<input type="text" name="description" class="form-control" v-model="portfolio.description">
										   </div>
						   
									   <div class="form-group">
										<label for="debut">Anfangsdatum</label>
										<input type="date" name="debut" class="form-control" v-model="portfolio.debut">
									   </div>
						   
									   <div class="form-group">
										<label for="fin">Enddatum</label>
										<input type="date" name="fin" class="form-control" v-model="portfolio.fin">
									   </div>
						   
									   <div class="form-group">	
										<button v-if="editpor" type="submit" class="  btn btn-danger form-control" v-on:click="updatePortfolio">Update</button>
			 
										<button v-else type="submit" class="  btn btn-primary form-control" v-on:click="addPortfolio">Hinzufügen</button>
	   
									</div>
						   
									 
						</div>	
						
						<ul class="list-group">
								
	
							<li class="list-group-item" v-for="exp in portfolios">
								<div class="pull-right">
									<button class="btn btn-warning btn-sm" v-on:click="editPortfolio(exp)">Bearbeiten</button>
									<button class="btn btn-danger btn-sm" v-on:click="deletePortfolio(exp)">Löschen</button>
								</div>
								<h3>@{{ exp.titre }}</h3>
								<p>@{{ exp.description }}</p>
								<small>@{{ exp.debut }} - @{{ exp.fin }}</small>
							</li>
						</ul>
	
					</div>
				</div>

			<hr>
			<!--  Kompetenenz  -->
			<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10"><h3 class="panel-title">Kompetenz</h3></div>
							<div class="col-md-2 text-right">			
							<!--	<a href="{{ url('experience/1') }}" class="btn btn-success">Hinzufügen</a> -->
								<button type="submit"  class="btn btn-primary form-control" v-on:click="openKomp = true">Hinzufügen</button>
							</div>
						</div>
						
					</div>
					<div class="panel-body">
						<div v-if="openKomp">
						
									   <div class="form-group">
										<label for="titre">Titel</label>
										<input type="text" name="titre" class="form-control" v-model="kompetenenz.titre">
									   </div>
									   <div class="form-group">
											<label for="description">description</label>
											<input type="text" name="description" class="form-control" v-model="kompetenenz.description">
										</div>
						   
									   <div class="form-group">
										<label for="debut">Anfangsdatum</label>
										<input type="date" name="debut" class="form-control" v-model="kompetenenz.debut">
									   </div>
						   
									   <div class="form-group">
										<label for="fin">Enddatum</label>
										<input type="date" name="fin" class="form-control" v-model="kompetenenz.fin">
									   </div>
						   
									   <div class="form-group">	
										<button v-if="editkomp" type="submit" class="  btn btn-danger form-control" v-on:click="updateKompetenenz">Update</button>
			 
										<button v-else type="submit" class="  btn btn-primary form-control" v-on:click="addKompetenenz">Hinzufügen</button>
	   
									</div>
						   
									 
						</div>	
						
						<ul class="list-group">
							<li class="list-group-item" v-for="exp in kompetenenzes">
								<div class="pull-right">
									<button class="btn btn-warning btn-sm" v-on:click="editKompetenenz(exp)">Bearbeiten</button>
									<button class="btn btn-danger btn-sm" v-on:click="deleteKompetenenz(exp)">Löschen</button>
								</div>
								<h3>@{{ exp.titre }}</h3>
								<p>@{{ exp.description }}</p>
								<small>@{{ exp.debut }} - @{{ exp.fin }}</small>
							</li>
						</ul>
	
					</div>
				</div>
		  
		</div>
	</div>
</div>

@endsection


@section('javascripts')





<script>
        window.Laravel = {!! json_encode([
			'csrfToken'		 => csrf_token(),
			'idExperience' 	 => $id,
			'url'			=>url('/')
  
        ]) !!};
</script>
<script src="{{ asset('js/myscript.js') }}"></script> 



@endsection