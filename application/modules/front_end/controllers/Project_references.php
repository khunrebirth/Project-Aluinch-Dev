<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_references extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();

		/*
		| -------------------------------------------------------------------------
		| SET UTILITIES
		| -------------------------------------------------------------------------
		*/

		// Model
		$this->load->model('Project_model');
		$this->load->model('Image_project_model');
		$this->load->model('Contact_page_model');
	}

	public function index()
	{
		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

		$project_id = 1;
		$page_content = $this->Project_page_model->get_project_pages_by_id($project_id);

		/*
		| -------------------------------------------------------------------------
		| SET DATA
		| -------------------------------------------------------------------------
		*/

		// Title Page
		$data['title'] = $page_content->meta_tag_title;

		// Meta Tag
		$data['meta']['title'] = $page_content->meta_tag_title;
		$data['meta']['description'] = $page_content->meta_tag_description;
		$data['meta']['keyword'] = $page_content->meta_tag_keywords;

		// OG & Twitter
		$data['og_twitter']['title'] = $page_content->meta_tag_title;
		$data['og_twitter']['description'] = $page_content->meta_tag_description;
		// $data['og_twitter']['image'] = base_url('storage/uploads/images/contacts/'. $page_content->img_og_twitter);
		$data['og_twitter']['image'] = '';

		// Content
		$data['content'] = 'project_references';

		// Utilities
		$data['projects'] = $this->Project_model->get_project_all();
		$data['contact_info'] = $this->Contact_page_model->get_contact_pages_by_id(1);

		/*
		| -------------------------------------------------------------------------
		| EXECUTE VIEWS
		| -------------------------------------------------------------------------
		*/

		$this->load->view('app', $data);
	}

	public function ajax_get_project_by_id($id, $page = null)
	{
		$status = 500;
		$response['success'] = 0;

		$project = $this->Project_model->get_project_by_id(hashids_decrypt($id));
		$image_projects = $this->Image_project_model->get_image_project_by_project_id(hashids_decrypt($id));

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

			if ($page == 'home') {
				$js_template = '
                    <script>
                        var $sync1 = $(".sync1"),
                            $sync2 = $(".sync2"),
                            flag = false,
                            duration = 300;
                        
                        $sync1.owlCarousel({
                            items: 1,
                            margin: 10,
                            nav: false,
                            dots: false
                        }).on(\'change.owl.carousel\', function (e) { 
                            if (e.namespace && e.property.name === \'items\' && !flag) {
                                flag = true;
                                $sync2.trigger(\'to.owl.carousel\', [e.item.index, duration, true]);
                                flag = false;
                            }
                        });
                        $sync2.owlCarousel({
                            items: 4,
                            margin: 10,
                            nav: false
                        }).on(\'click\', \'.owl-item\', function () {
                            $sync1.trigger(\'to.owl.carousel\', [$(this).index(), duration, true]);
                        }).on(\'change.owl.carousel\', function (e) {
                            if (e.namespace && e.property.name === \'items\' && !flag) {
                                flag = true;        
                                $sync1.trigger(\'to.owl.carousel\', [e.item.index, duration, true]);
                                flag = false;
                            }
                        });
    
                        var owl_port = $(\'.sync2\');
                        // Go to the next item
                        $(\'.arrow-right-project\').click(function() {
                            owl_port.trigger(\'next.owl.carousel\', [300]);
                        })
                        // Go to the previous item
                        $(\'.arrow-left-project\').click(function() {
                            // With optional speed parameter
                            // Parameters has to be in square bracket \'[]\'
                            owl_port.trigger(\'prev.owl.carousel\', [300]);
                        })
                    </script>
                ';
			} else {
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
			}


			$response['data'] = $html_template . $js_template;
		}

		// Send Response
		return $this->output
			->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}
}
