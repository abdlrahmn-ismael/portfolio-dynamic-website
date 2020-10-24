@extends('layouts.app')

@section('content')


     <h5 class="text-center">
          <a href="/admin/messeges"> Messeges Page </a>
          -
          <a href="/admin/projects"> Projects Page </a>
     </h5>


     <div class="project-page">
          
          <h1 class="text-center" style="margin-top: 100px">  
               <i class="fas fa-edit"></i>
               Project Page
          </h1>


          <!---------- Create Project Model ------------->
          <div class="modal fade" id="CreateProjectModal" tabindex="-1" role="dialog" aria-labelledby="CreateProjectModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" id="CreateProjectModalLabel"> Create Project </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                         <div class="modal-body">
                              <form>
                                   @csrf
                                   <input type="text" name="title" id="title" class="form-control" placeholder="Type Project Title...">
                                   <input type="text" name="date" id="date" class="form-control" placeholder="Type Project Date...">
                                   <input type="text" name="link" id="link" class="form-control" placeholder="Type Project Link...">
                                   <!--Upload Image Field-->
                                   <div class="upload-input">
                                        <label for="file" id="file-label">  <i class="fas fa-cloud-upload-alt"></i> &nbsp; Choose image...  </label>
                                        <input type="file" class="file form-control" id="file" name="img"   /> 
                                   </div>
                                   <textarea name="desc" id="desc" rows="7" class="form-control" placeholder="Type Project Description..."></textarea>
                              </form>
                         </div>
                         <br>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save</button>
                         </div>
                    </div>
               </div>
          </div>


          <div class="table-container manage-project">

               <!------- Create project button ---------->
               <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#CreateProjectModal" style="margin-bottom:20px">
                    <i class="fas fa-plus"></i> Add New Project 
               </button>


               <!------- Table ---------->
               <div class="table-responsive">
                    <table class="table table-striped">
                         <thead class="thead-dark text-center">
                              <tr>
                                   <th scope="col">#id</th>
                                   <th scope="col"> <i class="fas fa-title"></i> Title </th>
                                   <th scope="col"> <i class="fas fa-clock"></i>  Date </th>
                                   <th scope="col"> <i class="fas fa-image"></i>  Img </th>
                                   <th scope="col"> <i class="fas fa-comment"></i>  Desc </th>
                                   <th scope="col"> <i class="fas fa-link"></i> Link </th>
                                   <th scope="col"> <i class="fas fa-setting"></i> Action </th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($projects as $project)
                                   <tr>
                                        <th scope="row"> {{ $project->id }} </th>
                                        <th scope="row"> {{ $project->title }} </th>
                                        <th scope="row"> {{ $project->date }} </th>
                                        <th scope="row" class="img-site"> <img src="/images/sites-img/{{ $project->img }}" alt=""> </th>
                                        <th scope="row"> {{ substr( $project->desc , 0 , 50 ) . "..."}} </th>
                                        <th scope="row"> {{ substr( $project->link , 0 , 50 ) . "..."}} </th>
                                        <th scope="row" style="display:flex">
                                             <button class="btn btn-success" type="button" data-toggle="modal" data-target="#EditProjectModal">
                                                  <i class="fas fa-edit"></i> 
                                             </button>
                                             &nbsp;
                                             <button class="btn btn-primary">
                                                  <i class="far fa-eye"></i> 
                                             </button>
                                             &nbsp;
                                             <button class="btn btn-danger checked-btn">
                                                  <i class="far fa-trash-alt"></i> 
                                             </button>
                                        </th>
                                   </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>

     </div>

@endsection