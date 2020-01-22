<div class="container px-2 text-secondary">
    <div class="top card bg-dark text-white shadow border-0 my-4">
        <img src="https://images.unsplash.com/photo-1442570468985-f63ed5de9086?ixlib=rb-1.2.1&auto=format&fit=crop&w=1093&q=80" class="card-img" alt="Trip advisor" style="max-height:500px;">
        <div class="card-img-overlay" style="text-shadow: 2px 2px 6px #000000;">
            <h1 class="card-title font-weight-bold display-4 mt-5 ml-4">Trip Advisor</h1>
            <h3 class="card-text display-5 ml-4">Travelling is good for your soul</h3>
        </div>
    </div>
    <div class="d-flex fixed-bottom justify-content-end mx-5 px-5 mb-5">
        <span class="rounded-circle pr-5">
            <button type="button" class="btn btn-primary rounded-circle px-2 py-2 mx-0 my-0" id="add_place" data-toggle="modal" data-target="#modal" style="z-index:10;">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 172 172" style=" fill:#000000;">
                    <g fill="none" fill-rule="none" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none" fill-rule="nonzero"></path>
                        <g fill="#ffffff" fill-rule="evenodd">
                            <path d="M78.83333,14.33333v64.5h-64.5v14.33333h64.5v64.5h14.33333v-64.5h64.5v-14.33333h-64.5v-64.5z"></path>
                        </g>
                    </g>
                </svg>
            </button>
        </span>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title">Add place</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/home/add_place" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="font-weight-bold" for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="The name of your place" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="City name" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="country">Country</label>
                            <input type="text" class="form-control" name="country" id="country" placeholder="Country name" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="rating">Rating</label>
                            <select class="form-control" name="rating" id="rating">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="picture">Image</label>
                            <input type="text" class="form-control" name="picture" id="picture" placeholder="Place your image link here">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete" id="delete" value="true" class="btn btn-danger" style="display:none;">Delete</button>
                    <button type="submit" name="add" value="true" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <h2 class="font-weight-bold mt-5">Wonderful destination</h2>
    <div class="card-columns mt-4">
        <?php
        foreach ($data["places"] as $place) { ?>
            <div class="card_place card shadow" data-id="<?= $place->id; ?>">
                <img src="<?= $place->picture; ?>" class="card-img-top" alt="...">
                <div class="card-img-overlay text-white" style="text-shadow: 2px 2px 2px #000000;">
                    <h3 class="card-title font-weight-bold"><?= $place->name; ?></h3>
                    <p class="card-text"><?= $place->city; ?>, <?= $place->country; ?></p>

                    <div class="rating">
                        <?php
                        for ($i = 0; $i < $place->rating; $i++) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                    <g fill="#f1c40f">
                                        <path d="M86,128.1185l48.9555,29.54817l-12.99317,-55.685l43.25083,-37.46733l-56.9535,-4.83033l-22.25967,-52.51733l-22.25967,52.51733l-56.9535,4.83033l43.25083,37.46733l-12.99317,55.685z"></path>
                                    </g>
                                </g>
                            </svg>
                        <?php } ?>
                    </div>
                    <a href="" class="edit" id="edit" data-toggle="modal" data-target="#modal" data-id="<?= $place->id; ?>">
                        <svg class="mt-3 position-relative edit_button<?= $place->id; ?>" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000; display:none;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#ffffff">
                                    <path d="M129,14.33333l-17.30078,17.30078l28.66667,28.66667l17.30078,-17.30078zM100.87923,42.4541l-79.37923,79.37923v28.66667h28.66667l79.37923,-79.37923z"></path>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a href="" class="delete" id="delete" data-toggle="modal" data-target="#modal" data-id="<?= $place->id; ?>">
                        <svg class="mt-3 position-relative delete_button<?= $place->id; ?>" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#000000; display:none;">
                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                <g fill="#e74c3c">
                                    <path d="M72.76923,-0.20673c-5.53004,0 -10.95673,1.08534 -14.88462,4.96154c-3.92788,3.87621 -5.16827,9.38041 -5.16827,15.09135h-26.25481c-3.64363,0 -6.61538,2.97176 -6.61538,6.61538h-6.61538v13.23077h145.53846v-13.23077h-6.61538c0,-3.64363 -2.97176,-6.61538 -6.61538,-6.61538h-26.25481c0,-5.71094 -1.24038,-11.21514 -5.16827,-15.09135c-3.92788,-3.8762 -9.35456,-4.96154 -14.88462,-4.96154zM72.76923,13.4375h26.46154c3.61779,0 4.75481,0.85276 5.16827,1.24038c0.41346,0.38762 1.24038,1.47296 1.24038,5.16827h-39.27885c0,-3.69531 0.82692,-4.78065 1.24038,-5.16827c0.41346,-0.38762 1.55048,-1.24038 5.16827,-1.24038zM26.46154,46.30769v105.84615c0,10.93089 8.91526,19.84615 19.84615,19.84615h79.38462c10.93089,0 19.84615,-8.91526 19.84615,-19.84615v-105.84615zM52.92308,66.15385h13.23077v79.38462h-13.23077zM79.38462,66.15385h13.23077v79.38462h-13.23077zM105.84615,66.15385h13.23077v79.38462h-13.23077z"></path>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>