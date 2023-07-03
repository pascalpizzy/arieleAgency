
<x-ui.header/>


   <!-- Contact Start -->
   <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Edit Job</h5>
                <h1 class="mb-0">You are about to edit this job posting</h1>
            </div>
           
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form method="POST" action="{{ route('store_edited_job', ['unique_id' => $findJob->unique_id]) }}" role="form" enctype="multipart/form-data">
                    @csrf
                        <div class="row g-3">
                        <div class="col-md-6">
                                <input name="image" type="file" class="form-control border-0 bg-light px-4" placeholder="Image" style="height: 55px;" required>
                            </div>

                            <div class="col-md-6">
                                <input name="deadline" value="{{$findJob->deadline}}" type="date" class="form-control border-0 bg-light px-4" placeholder="Deadline" style="height: 55px;">
                            </div>
                           
                            <div class="col-12">
                                <input name="title" value="{{$findJob->title}}" type="text" class="form-control border-0 bg-light px-4" placeholder="Title" style="height: 55px;">
                            </div>


                            <div class="col-12">
                                <textarea name="about_job" class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="About Job">{{$findJob->about_job}}</textarea>
                            </div>

                            <div class="col-6">
                                <input name="salary" type="text" value="{{$findJob->salary}}" class="form-control border-0 bg-light px-4" placeholder="Salary" style="height: 55px;">
                            </div>

                            <div class="col-6">
                                <button class="btn btn-primary w-100 py-3" type="submit">Update Job</button>
                            </div>
                        </div>
                    </form>
                </div>
              
            </div>
        </div>
    </div>
    <!-- Contact End -->
    
    @include('sweetalert::alert')

    <!-- Footer Start -->
    <x-ui.footer/>