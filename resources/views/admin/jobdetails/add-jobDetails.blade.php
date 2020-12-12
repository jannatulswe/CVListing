<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Job Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.save-jobDetails')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Job Title</label>
                        <input type="text" name="job_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Company Name</label>
                        <input type="text" name="company_name" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Vacancy</label>
                        <input type="text" name="vacancy" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Job Responsibilities</label>
                        <input type="text" name="job_responsibilities" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Employment Status</label>
                        <input type="text" name="employee_status" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Educational Requirements</label>
                        <input type="text" name="educational_requirement" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Experience Requirements</label>
                        <input type="text" name="experience_requirement" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Additional Requirements</label>
                        <input type="text" name="additional_requirement" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Job Location</label>
                        <input type="text" name="job_location" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Salary</label>
                        <input type="text" name="salary" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category Id</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Publication Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option>select</option>
                            <option value="1">Published</option>
                            <option value="0">UnPublished</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

