  <!-- Edit All Data Modal -->
  <div class="modal fade text-left" id="edit_one" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <!-- Form -->
              <form enctype="multipart/form-data" id="pricing_edit_form" action="{{ route('cms.store') }}"
                  method="POST" class="mt-2">
                  @csrf
                  <div class="">
                      <input type="hidden" name="id" id="edit_id">
                      <div class="col-12">
                          <div class="form-group mb-2">
                              <label for="cms-edit-title">Title</label>
                              <input name="title" type="text" id="cms-edit-title" class="form-control" />
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="form-group mb-2">
                              <label for="cms-edit-decription">Description</label>
                              <textarea data-length="200" class="form-control char-textarea" id="cms-edit-decription" rows="3" name="description"> </textarea>
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="form-group mb-2">
                              <label for="cms-edit-slug">Slug</label>
                              <input type="text" name="slug" id="cms-edit-slug" class="form-control" />
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="form-group mb-2">
                              <select class="form-control js-example-tokenizer" name="keyword[]" id="cms-edit-keyword" multiple="multiple"></select>
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="form-group mb-2">
                              <label for="">Status</label>
                              <select name="status" class="form-control" id="pricing-edit-status">
                                  <option value="1">Published</option>
                                  <option value="2">Draft</option>
                              </select>
                          </div>
                      </div>

                      <div class="col-12 mt-5 mb-5">
                          <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </form>
              <!--/ Form -->
          </div>
      </div>
  </div>