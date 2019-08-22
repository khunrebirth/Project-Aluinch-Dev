<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectReferences extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /home.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();

        // Set Model
        $this->load->model('project_model');
        $this->load->model('image_project_model');
    }


    public function index()
	{
	    // Set Data
		$data['content'] = 'project-references';
        $data['projects'] = $this->project_model->get_project_all();

		$this->load->view('app', $data);
	}

	public function ajax_get_project_by_id($id)
    {
        $status = 500;
        $response['success'] = 0;

        $project = $this->project_model->get_project_by_id(hashids_decrypt($id));
        $image_projects = $this->image_project_model->get_image_project_by_project_id(hashids_decrypt($id));

        if ($project != false && $image_projects != false) {

            $status = 200;
            $response['success'] = 1;

            $html_img_sync1 = '';
            $html_img_sync2 = '';

            foreach ($image_projects as $image_project) {
                $html_img_sync1 .=
                    '<div class="item">
                        <img src="' . base_url("storage/uploads/images/projects/$image_project->title") . '" class="img-responsive"/>
                    </div>';

                $html_img_sync2 .=
                    '<div class="item">
                        <img src="' . base_url("storage/uploads/images/projects/$image_project->title") . '" class="img-responsive"/>
                    </div>';
            }

            $html_template = '
                <div class="warp-slide project-gal">
                    <div class="sync1" class="owl-carousel">
                        ' . $html_img_sync1 . '
                    </div>
                    <div class="main-thumb">
                        <div class="arrow-left-project"><i class="glyphicon glyphicon-menu-left"></i></div>
                        <div class="arrow-right-project"><i class="glyphicon glyphicon-menu-right"></i></div>
                        <div class="sync2" class="owl-carousel">
                            ' . $html_img_sync2 . '
                        </div>
                    </div>
                    <h1>' . $project->title . '</h1>
                    <p class="text-center">' . $project->description . '</p>
                    <br />
                 </div>
            ';

            $js_template = '
                <script>
                    $(document).ready(function() {
                        
                        var sync1 = $(".sync1")
                        var sync2 = $(".sync2")

                        sync1.owlCarousel({
                            singleItem : true,
                            slideSpeed : 1000,
                            navigation: false,
                            pagination:false,
                            afterAction : syncPosition,
                            responsiveRefreshRate : 200,
                        })

                        sync2.owlCarousel({
                            items: 4,
                            itemsDesktop: [1199,4],
                            itemsDesktopSmall: [979,4],
                            itemsTablet: [768,4],
                            itemsMobile: [479,3],
                            navigation: false,
                            navigationText: [
                                "<i class=\'glyphicon glyphicon-menu-left\'></i>",
                                "<i class=\'glyphicon glyphicon-menu-right\'></i>"
                            ],
                            pagination:false,
                            responsiveRefreshRate : 100,
                            afterInit : function(el) {
                                el.find(".owl-item").eq(0).addClass("synced")
                            }
                        })

                        function syncPosition(el) {
                            var current = this.currentItem;
                            $(".sync2")
                                .find(".owl-item")
                                .removeClass("synced")
                                .eq(current)
                                .addClass("synced")
                            if ($(".sync2").data("owlCarousel") !== undefined) {
                                center(current)
                            }
                        }

                        $(".sync2").on("click", ".owl-item", function(e){
                            e.preventDefault()
                            
                            var number = $(this).data("owlItem")
                            sync1.trigger("owl.goTo",number)
                        });

                        function center(number){
                            
                            var sync2visible = sync2.data("owlCarousel").owl.visibleItems
                            var num = number
                            var found = false
                            
                            for (var i in sync2visible){
                                if(num === sync2visible[i]){
                                    var found = true
                                }
                            }
                        
                            if (found === false) {
                                if (num > sync2visible[sync2visible.length-1]) {
                                    sync2.trigger("owl.goTo", num - sync2visible.length+2)
                                } else {
                                    if(num - 1 === -1) {
                                        num = 0
                                    }
                                    sync2.trigger("owl.goTo", num)
                                }
                            } else if(num === sync2visible[sync2visible.length-1]){
                                sync2.trigger("owl.goTo", sync2visible[1])
                            } else if(num === sync2visible[0]){
                                sync2.trigger("owl.goTo", num-1)
                            }
                        }
                        
                    })

                    function random(owlSelector){
                        owlSelector.children().sort(function() {
                            return Math.round(Math.random()) - 0.5
                        }).each(function(){
                            $(this).appendTo(owlSelector)
                        })
                    }

                    var owl_sync2 = $(".sync2")
                    $(".arrow-right-project").click(function(){
                        owl_sync2.trigger(\'owl.next\')
                    })
                    $(".arrow-left-project").click(function(){
                        owl_sync2.trigger(\'owl.prev\')
                    })
                </script>
            ';

            $response['data'] = $html_template . $js_template;
        }

        // Send Response
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
