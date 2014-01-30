$(document).ready(function() {
	
	$(function() {
		if (window.innerWidth < 850 && window.innerHeight < 850) {} else {
			$("#menu ul").supersubs({
				minWidth: 15,
				maxWidth: 100
			}).superfish({
				autoArrows: false,
				dropShadows: false
			});
		}
	});
	

	

	// HIDE LEFT PANEL
	$(".hide-btn").click(function(){
		if($("#left").css("width") == "0px"){
			$("#left").animate({width:"230px"}, 500);
			$("#right").animate({marginLeft:"250px"}, 500);
			$("#wrapper, #container").animate({backgroundPosition:"0 0"}, 500);
			$(".hide-btn.top, .hide-btn.center, .hide-btn.bottom").animate({left: "223px"}, 500, function() { $(window).trigger("resize");});
			$(this).attr("original-title", "Close sidebar");
		}
		else{
			$("#left").animate({width:"0px"}, 500);
			$("#right").animate({marginLeft:"20px"}, 500);
			$("#wrapper, #container").animate({backgroundPosition:"-230px 0px"}, 500);
			$(".hide-btn.top, .hide-btn.center, .hide-btn.bottom").animate({left: "-7px"}, 500, function() { $(window).trigger("resize");});
			$(this).attr("original-title", "Open sidebar");
		}
	});
	
	// HIDE BOXES	
		$(function() {
		$('.title .hide').showContent();
	});
	
	$.fn.showContent = function() {
		return this.each(function() {
			var box = $(this);
			var content = $(this).parent().next('.content');
	
			box.toggle(function() {
				content.slideUp(500);
				$(this).css('background-position', 'right bottom');
			}, function() {
				content.slideDown(500);
				$(this).css('background-position', 'right top');
			});
	
		});
	};
	
	$(function() {
		$('.title .show').hideContent();
	});
	
	$.fn.hideContent = function() {
		return this.each(function() {
			var box = $(this);
			var content = $(this).parent().next('.content');
			
			box.toggle(function() {
				content.slideDown(500);
				$(this).css('background-position', 'right top');
			}, function() {
				content.slideUp(500);
				$(this).css('background-position', 'right bottom');
			});
	
		});
	};
	
	// MESSAGE BOX
	$('#wrapper #container #top #labels ul li.subnav').hover(function() {
		$('#wrapper #container #top #labels ul ul').slideToggle(400);
		return false
	});
	
	// SIDE PANEL TOGGLE MENU
	$(".togglemenu ul").accordion({ 
		header: 'li.title',
		autoHeight: false
	});
	
	// TABS
	$(".tabs").tabs();
	
	// WIZARD    
    $('.wizard').smartWizard({
        transitionEffect:'fade'
    });
	
	// TOOLTIPS
	$(".tip-n").tipsy({gravity: 'n'});
	$(".tip-w").tipsy({gravity: 'w'});
	$(".tip-e").tipsy({gravity: 'e'});
	$(".tip-s").tipsy({gravity: 's'});
	
	// MODAL WINDOW
	$('.modalopen').each(function() {  
		$.data(this, 'dialog', 
		  $(this).next('.modal').dialog({
            autoOpen: false,
            closeText: '',
            resizable: false,
			modal: true,
			show: "fade",
			hide: "fade",
            width: 700,
			height: 392
		  })
		);  
	}).click(function() {  
		$.data(this, 'dialog').dialog('open');  
		return false;  
	});  
	
	$(window).resize(function() {
		$(".modal").dialog("option", "position", "center");
	});
	
	// BREADCRUMBS
	jQuery("#breadcrumbs").jBreadCrumb({easing:'swing'});
	
	// SYSTEM MESSAGES
	$(".message").click(function () {
      $(this).fadeOut();
    });
	
	// PROGRESSBAR
	$(".progressbar-normal").each(function() {
		$(this).progressbar({
			value: parseInt($(this).attr("value"))
		});
	});
	
	jQuery.ease = function(start, end, duration, easing, callback) {
		var easer = $("<div>");
		var stepIndex = 0;
		var estimatedSteps = Math.ceil(duration / 13);

		easer.css("easingIndex", start);
		easer.animate({
			easingIndex: end
		}, {
			easing: easing,
			duration: duration,
			step: function(index) {
				callback(
				index, stepIndex++, estimatedSteps, start, end);
			}
		});
	};
	
	$(".progressbar-count").each(function() {
		var $self = $(this),targetVal = parseInt($self.attr("value"));
		$self.progressbar({
			value: 0
		});
		$self.prev(".percent").text("0%");
		$.ease(0,targetVal,3500,"swing",function(i){
			$self.progressbar("option","value",parseInt(i));
			$self.prev(".percent").text(parseInt(i) + "%");
		});
	});
	
	// CALENDAR
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		editable: true,
		height: 550,
		events: [
			{
				title: 'All Day Event',
				start: new Date(y, m, 1)
			},
			{
				title: 'Long Event',
				start: new Date(y, m, d-5),
				end: new Date(y, m, d-2)
			},
			{
				id: 999,
				title: 'Repeating',
				start: new Date(y, m, 7, 16, 0),
				allDay: false
			},
			{
				id: 999,
				title: 'Repeating',
				start: new Date(y, m, d+4, 16, 0),
				allDay: false
			},
			{
				title: 'Meeting',
				start: new Date(y, m, d, 10, 30),
				allDay: false
			},
			{
				title: 'Lunch',
				start: new Date(y, m, d, 12, 0),
				end: new Date(y, m, d, 14, 0),
				allDay: false
			},
			{
				title: 'Birthday Party',
				start: new Date(y, m, d+1, 19, 0),
				end: new Date(y, m, d+1, 22, 30),
				allDay: false
			},
			{
				title: 'Click for ThemeForest',
				start: new Date(y, m, 28),
				end: new Date(y, m, 29),
				url: 'http://www.themeforest.net'
			}
		]
	});
	
	// SLIDERS
	$(".single-slide div.slide").each(function() {
        value = $(this).attr('value').split(',');
        firstVal = value;

        rangeSpan = $(this).siblings('input.amount');

        $(this).slider({
            value: [firstVal],
            min: parseInt($(this).attr('min'), 0),
            max: parseInt($(this).attr('max'), 0),
            slide: function(event, ui) {
                $(this).siblings('input.amount').val("" + ui.value);
            }
        });
        rangeSpan.val("" + $(this).slider("value"));
    });
	
    $(".range-slide div.slide").each(function() {
        values = $(this).attr('value').split(',');
        firstVal = values[0];
        secondVal = values[1];

        rangeInputfirst = $(this).siblings('input.amount-first');
        rangeInputsecond = $(this).siblings('input.amount-second');

        $(this).slider({
            values: [firstVal, secondVal],
            min: parseInt($(this).attr('min'), 0),
            max: parseInt($(this).attr('max'), 0),
            range: true,
            slide: function(event, ui) {
                $(this).siblings('input.amount-first').val("" + ui.values[0]);
                $(this).siblings('input.amount-second').val("" + ui.values[1]);
            }
        });
        rangeInputfirst.val("" + $(this).slider("values", 0));
        rangeInputsecond.val("" + $(this).slider("values", 1));
    });
	
    $(".snap-slide div.slide").each(function() {
        value = $(this).attr('value').split(',');
        firstVal = value;

        rangeSpan = $(this).siblings('input.amount');

        $(this).slider({
            value: [firstVal],
            min: parseInt($(this).attr('min'), 0),
            max: parseInt($(this).attr('max'), 0),
			step: parseInt($(this).attr('step'), 0),
            slide: function(event, ui) {
                $(this).siblings('input.amount').val("" + ui.value);
            }
        });
        rangeSpan.val("" + $(this).slider("value"));
    });
	
	$(".single-vert-slide div.slide").each(function() {
        value = $(this).attr('value').split(',');
        firstVal = value;

        rangeSpan = $(this).siblings('input.amount');

        $(this).slider({
			orientation: "vertical",
            value: [firstVal],
            min: parseInt($(this).attr('min'), 0),
            max: parseInt($(this).attr('max'), 0),
            slide: function(event, ui) {
                $(this).siblings('input.amount').val("" + ui.value);
            }
        });
        rangeSpan.val("" + $(this).slider("value"));
    });
	

	// PIROBOX
	
	// FORM VALIDATION
	$.validator.addMethod('require-one', function(value) {
		return $('.require-one:checked').size() > 0;
	}, 'Please, check at least one box.');

	var checkboxes = $('.right .require-one');
	var checkbox_names = $.map(checkboxes, function(e, i) {
		return $(e).attr("name")
	}).join(" ");

	$('.valid').each( function(){
		$(this).validate({
			meta: "validate",
			ignore: [],
			groups: {
				checks: checkbox_names
			},
			errorPlacement: function(error, element) {
				if (element.attr("type") == "checkbox") error.insertAfter(element.parent().siblings().last());
				else if (element.is("select")) {
					error.insertAfter(element.next("a.ui-selectmenu"))
				}
				else error.insertAfter(element);
			}
		});
	});
	
	// INPUT PLACEHOLDER
	$('input[placeholder], textarea[placeholder]').placeholder();
	
	// SELECTBOXES
	$(function() {
		$('.dataTables_length input, select').not("select.multiple").selectmenu({
			style: 'dropdown',
			transferClasses: true,
			width: null,
			change: function(e, obj) {
			
				if (! $(this).hasClass('wo-links'))
				{
					// $(".valid").validate().element(this);
				}				
			},
			
			select: function()
			{
				if ($(this).hasClass('wo-links'))
				{
					window.location.href = $(this).val();
				}				
			}
		});
	});
	
	// RADIOBUTTONS & CHECKBOXES
	$("input[type=radio], input[type=checkbox]").each(function() {
        if ($(this).parents("table").length === 0) {
            $(this).customInput();
        }
    });
	
	// FILE INPUT STYLE
    $("input[type=file]").filestyle({
        imageheight: 28,
        imagewidth: 85,
        width: 150
    });
	
	// DATEPICKER
	$(".datepicker").datepicker({
		dateFormat: 'mm-dd-yy',
		changeMonth: true,
		changeYear: true,
		yearRange: "c-20:+00"
	});
	
	// WYSIWYG EDITOR
	$('.wysiwyg').wysiwyg({
        css: "css/wysiwyg-editor.css",
        plugins: {
            rmFormat: {
                rmMsWordMarkup: true
            }
        }
    });
	
	// AUTOGROW TEXTAREA
	jQuery('.grow').elastic();
	
	// INPUT FILTER
	$('.onlytext').filter_input({regex:'[a-zA-Z]'}); 
	$('.onlylow').filter_input({regex:'[a-z]'}); 
	$('.onlyup').filter_input({regex:'[A-Z]'}); 
	$('.onlynum').filter_input({regex:'[0-9]'}); 
	$('.onlyurl').filter_input({regex:'[a-zA-Z0-9_]'}); 
	
	// DATATABLE
    $('table.all').dataTable({
        "bInfo": false,
        "iDisplayLength": 100,
        "aLengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
        "sPaginationType": "full_numbers",
        "bPaginate": true,
        "sDom": '<f>t<pl>'
    });
	
	$('table.pagesort').dataTable({
        "bInfo": false,
        "iDisplayLength": 100,
        "aLengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
        "sPaginationType": "full_numbers",
        "bPaginate": true,
		"bFilter": false,
        "sDom": 't<pl>'
    });

    $('table.sortsearch').dataTable({
        "bInfo": false,
        "bPaginate": false,
        "sDom": 't<plf>'
    });

    $('table.sorting').dataTable({
        "bInfo": false,
        "bPaginate": false,
        "bFilter": false,
        "sDom": 't<plf>'
    });

    $(".dataTables_wrapper .dataTables_length select").addClass("entries");
	
	// CHARTS        
    $("table.chart").each(function() {
        var colors = [];
        $("table.chart thead th:not(:first)").each(function() {
            colors.push($(this).css("color"));
        });
        $(this).graphTable({
            series: 'columns',
            position: 'replace',
			width: '100%',
            height: '200px',
            colors: colors
        }, {
            xaxis: {
                tickSize: 1
            },
			yaxis: {
				max: null,
				autoscaleMargin: 0.02
            }
        });
    });

    $("table.chart-date").each(function() {
        var colors = [];
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        $("table.chart-date thead th:not(:first)").each(function() {
            colors.push($(this).css("color"));
        });
        $(this).graphTable({
            series: 'columns',
            position: 'replace',
            width: '100%',
            height: '250px',
            colors: colors,
            xaxisTransform: function(month) {
                var i = 0;
                while ((i < 12) && (month != months[i])) {
                    i++;
                }
                return i;
            }
        }, {
            xaxis: {
                tickSize: 1,
                tickFormatter: function(v, a) {
                    return months[v];
                }
            },
			yaxis: {
				max: null,
				autoscaleMargin: 0.02
            }
        });
    });
	
	$("table.chart-pie").each(function() {
        var colors = [];
        $("table.chart-pie thead th:not(:first)").each(function() {
            colors.push($(this).css("color"));
        });
        $(this).graphTable({
            series: 'columns',
            position: 'replace',
			width : '100%',
            height: '250px',
            colors: colors
        }, {
			series: {
				pie: {
					show: true,
					pieStrokeLineWidth: 0, 
					pieStrokeColor: '#FFF',
					radius: 100,
					label: {
						show: true,
						radius: 3/4,
						formatter: function(label, series){
							return '<div style="font-size:11px; padding:2px; color: #FFFFFF;"><b>'+label+'</b>: '+Math.round(series.percent)+'%</div>';
						},
						background: {
							opacity: 0.5,
							color: '#000'
						}
					}
				}
			},
			legend: {
				show: false
			},
			grid: {
				hoverable: false,
				autoHighlight: false
			}
        });
    });
	
	$("table.chart-square").each(function() {
        var colors = [];
        $("table.chart-square thead th:not(:first)").each(function() {
            colors.push($(this).css("color"));
        });
        $(this).graphTable({
            series: 'columns',
            position: 'replace',
			width : '100%',
            height: '250px',
            colors: colors
        }, {
			series: {
				pie: {
					show: true,
					pieStrokeLineWidth: 0, 
					pieStrokeColor: '#FFF',
					radius: 800,
					label: {
						show: true,
						radius: 3/4,
						formatter: function(label, series){
							return '<div style="font-size:11px; padding:2px; color: #FFFFFF;"><b>'+label+'</b>: '+Math.round(series.percent)+'%</div>';
						},
						background: {
							opacity: 0.5,
							color: '#000'
						}
					}
				}
			},
			legend: {
				show: false
			},
			grid: {
				hoverable: false,
				autoHighlight: false
			}
        });
    });
	
	$("table.chart-bars").each(function() {
        var colors = [];
        $("table.chart-bars thead th:not(:first)").each(function() {
            colors.push($(this).css("color"));
        });
        $(this).graphTable({
            series: 'columns',
            position: 'replace',
			width : '100%',
            height: '250px',
            colors: colors
        }, {
			xaxis: {
                tickSize: 1
            },
			series: {
				bars: {
					show: true,
					lineWidth: 1,
					barWidth: 0.7,
					fill: true,
					fillColor: null,
					align: "center",
					horizontal: false
				},
				lines: {
					show: false
				},
				points: {
					show: false
				}
			},
			yaxis: {
				max: null,
				autoscaleMargin: 0.02
            }
        });
    });
	
	$("table.chart-barsmulti").each(function() {
        var colors = [];
        $("table.chart-barsmulti thead th:not(:first)").each(function() {
            colors.push($(this).css("color"));
        });
        $(this).graphTable({
            series: 'columns',
            position: 'replace',
			width : '100%',
            height: '250px',
            colors: colors
        }, {
			xaxis: {
                tickSize: 1
            },
			series: {
				bars: {
					show: true,
					lineWidth: 1,
					barWidth: 0.4,
					fill: true,
					fillColor: null,
					align: "center",
					horizontal: false,
					multiplebars:true
				},
				lines: {
					show: false
				},
				points: {
					show: false
				}
			},
			yaxis: {
				max: null,
				autoscaleMargin: 0.02
            }
        });
    });

    $('.flot-graph').before('<div class="space"></div>');

    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5
        }).appendTo("body").fadeIn("fast");
    }

    var previousPoint = null;
    $(".flot-graph").bind("plothover", function(event, pos, item) {
        $("#x").text(pos.x);
        $("#y").text(pos.y);

        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var x = item.datapoint[0],
                    y = item.datapoint[1];

                showTooltip(item.pageX, item.pageY, "<b>" + item.series.label + "</b>: " + y);
            }
        }
        else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
	
	// PIROBOX
	$(".gallery .pirobox").piroBox_ext({
        piro_speed : 700,
        bg_alpha : 0.5,
        piro_scroll : true
    });

    var subs = { "n_s_e_w" : { str : "North", values: ["North", "South", "East", "West"] },
                 "ne_sw_se_nw" : { str : "Northeast", values: ["Northeast", "Southwest", "Southeast", "Northwest"] } };
    var slope_statements = { "front" : "During our inspection of the {{house_face}} (Front) facing slopes we found {{damaged}} {{type}}-damaged shingles.",
                                         "rear"  : "During our inspection of the {{house_face}} (Rear) facing slopes we found {{damaged}} {{type}}-damaged shingles.",
                                         "left"  : "During our inspection of the {{house_face}} (Left) facing slopes we found {{damaged}} {{type}}-damaged shingles.",
                                         "right" : "During our inspection of the {{house_face}} (Right) facing slopes we found {{damaged}} {{type}}-damaged shingles." };
    var reverse_lookup = { "North" : { "rear" : { "rear" : "North", "front" : "South", "right" : "East", "left" : "West" },
                                       "front" : { "front" : "North", "rear" : "South", "left" : "East", "right" : "West"},
                                       "left"  : { "left" : "North", "right" : "South", "rear" : "East", "front" : "West"},
                                       "right" : { "right" : "North", "left" : "South", "front" : "East", "rear" : "West"}
                            },
                           "Northeast" : { "rear" : { "rear" : "Northeast", "front" : "Southwest", "right" : "Southeast", "left" : "Northwest" },
                                           "front" : { "front" : "Northeast", "rear" : "Southwest", "left" : "Southeast", "right" : "Northwest"},
                                           "left"  : { "left" : "Northeast", "right" : "Southwest", "rear" : "Southeast", "front" : "Norhtwest"},
                                           "right" : { "right" : "Northeast", "left" : "Southwest", "front" : "Southeast", "rear" : "Northwest"}
                            }
                          };

    var brittle_stmt = { str: "Brittleness test: The roof {{stmt}} found to be brittle."};
    var face_stmt = "Which directional face is {{face}}?";

    if ($('#inspection-form .house-face').val() != "blank" && typeof $('#inspection-form .house-face').val() !== 'undefined' ) {
        $('.house-direction').show();
        $('.house-direction').find('label').text(face_stmt.replace("{{face}}", subs[$('.house-face').val()].str));
    }

    /* Adds shingle amounts to slope type in slope */
    $('.slope').children().children().children(".content").on('click', 'input[type=checkbox]', function() {
        if ($(this).hasClass('comment-box')) {
            load_comment_box($(this), true);
        } else {
            load_slope($(this));
        }
    });

    function load_slope(el) {
        var shingle_class = $(el[0].nextSibling).children();
        var type = el.parent().parent().parent().parent().parent().parent().parent().find('.slope-title-helper');

        if ($('.house-face').val() == 'blank') {
            alert('You need to select the direction the house faces first!');
            el.next().removeClass('checked');
            el[0].checked = false;
            return false;
        }
        
        var stmt = slope_statements[el.next().text().toLowerCase()];
        var house_face = subs[$('.house-face').val()].str;
        
        if (shingle_class.hasClass('change-shingle-amount')) {
            shingle_class.remove();
        }

        if (el[0].checked) {
            var answer = prompt("How many shingles were affected?");
            if (answer !== null && answer !== "") {
                pre_append_text = el.next().text().toLowerCase();
                el.next().append("<span class=\"change-shingle-amount\">&nbsp;(<a href='#'>" + answer + "</a>)</span>");
                stmt = stmt.replace("{{house_face}}", reverse_lookup[house_face][$('.house-direction-select').val()][pre_append_text]);
                stmt = stmt.replace("{{damaged}}", answer);
                stmt = stmt.replace("{{type}}", type.text().toLowerCase().trim());
                el.val(stmt);
                console.log(el.val());
            } else {
                el.next().removeClass('checked');
                el[0].checked = false;
            }
        } else {
            el.val(slope_statements[el.next().text().toLowerCase()]);
        }
    }

    $('.house-face').change(function() {
       el = $(this);

        if ($(this).val() != 'blank') {
            if (!$('.house-direction').hasClass('house-direction-active')) {
                $('.house-direction').toggle(800).addClass('house-direction-active');
            }

            $('.house-direction').find('label')
                             .text(face_stmt.replace('{{face}}', subs[el.val()].str));
        } else {
            $('.house-direction').toggle(800).removeClass('house-direction-active');
        }
    });

    $(document).on('click', '.change-shingle-amount a', function() {
        var answer = prompt("How many shingles were affected?", $(this).text());
        if (answer !== null && answer !== "") {
            $(this).text(answer);
            var checkbox = $(this).parent().parent().parent().find('input[type=checkbox]');
            var pattern = "[0-9]+";
            var res = checkbox.val().match(pattern);
            if (typeof res[0] !== "undefined") {
                str = checkbox.val().replace(res[0], answer);
                checkbox.val(str);
            }
        }

        return false;
    });

    $('.fallen-tree, .metal-damage, .excess-debris').click(function() {
        load_comment_box($(this), false);
    });

    function load_comment_box(el, slope) {
        var comment_class = $(el[0].nextSibling).children();

        if (comment_class.hasClass('extra-comment')) {
            comment_class.remove();
        }

        if (el[0].checked) {	

            var answer = prompt("Comment:");
            if (answer !== null && answer !== "") {
                if (slope) {
                	$(e1).empty()
                    el.next().append("<span class=\"extra-comment _slope\">&nbsp;(<a href='#'><span class=\"italic\">+c</span></a>)</span>");
                    el.val(el.next().text() + ": " + answer);
                    el.next().addClass('checked');
                } else {
                	$(e1).empty()
                    el.next().append("<span class=\"extra-comment\">&nbsp;(<a href='#'><span class=\"italic\">+c</span></a>)</span>");
                    el.val(answer);
                    el.next().addClass('checked');
                }
            } else {
                el.next().removeClass('checked');
                el[0].checked = false;
            }
        }
    }

    $(document).on('click', '.extra-comment a', function() {
        var checkbox = $(this).parent().parent().parent().find('input[type=checkbox]');

        var answer = prompt("Comment:", checkbox.val().replace(checkbox.next().text(), ''));
        if (answer !== null && answer !== "") {
            $(this).text("+c");
            if ($(this).hasClass('_slope')) {
                el.val(el.next().text().replace('+c', '') + ": " + answer);
            } else {
                checkbox.val(answer);
            }
        }

        return false;
    });

    $('.roofer-present').click(function(e) {
        $('.roofer').toggle(800);
    });

    $('.brittle').click(function(e) {
        if ($(this)[0].checked == 1) {
            $(this).val(brittle_stmt.str.replace("{{stmt}}", "was"));
        } else {
            $(this).val(brittle_stmt.str.replace("{{stmt}}", "was not"));
        }
    });


    $('.auto-upgrade').click(function(e) {
        var path = window.location.pathname;
        var inspection_id = path.split('/')[3];

        if ($(this).val() == 1) {
            window.location.href = "/inspections/form/" + inspection_id  + "/1";
        } else {
            window.location.href = "/inspections/form/" + inspection_id + "/2";
        }
    });

    $(document).on('click', '.siding-type', function() {
        var clicked = 0;

        $('.siding-type').each(function() {
            if ($(this)[0].checked == 1) {
                clicked++;
            }
        });
   
        if (clicked <= 1 && !$('.siding-damaged').hasClass('siding-active')) {
             $('.siding-damaged').toggle(800)
                                 .addClass('siding-active');
        } else if (clicked === 0) {
             $('.siding-damaged').toggle(800)
                                 .removeClass('siding-active');
        }

        show_siding_damage_amount_inputs($('.siding-damage'), $('.siding-type'), false);
    });

    $('.siding-damage').click(function() {
        show_siding_damage_amount_inputs($(this), $('.siding-type'), true);
    });

    // Save report
    $('#save-report').click(function() {
        var splitted = document.URL.split('/');

        window.location = "/workorders/generate/" + splitted[5];
    });



    //add (#) to all checked values
	$('.custom-checkbox').find('input[checked="checked"]').each(function() {
		var r = /\d+/;
				//if + 
			var id = $(this).attr('id');
			
			console.log(label);

			 
			if($(this).attr('value').indexOf('slopes')!=-1){
				var label = $(this).parent().find('label');

				if($(label).hasClass('checked')){
				 var tmp = $(this).attr('value').match(r)[0];
				 var result = '<span class="change-shingle-amount">&nbsp;(<a href="#">'+tmp+'</a>)</span>';
				
				 $(label).append(result);
				 }
				} 
			//if #
			else if($(this).attr('value').indexOf('+c')!=-1){
				var label = $(this).parent().find('label');
				if($(label).hasClass('checked')){
				var tmp = $(this).attr('value').split(':')[1].substring(1);
				console.log(tmp);
					//check if slope
				//.append("<span class=\"extra-comment _slope\">&nbsp;(<a href='#'><span class=\"italic\">+c</span></a>)</span>");
				var result = '<span class=\"extra-comment\">&nbsp;(<a href="#"><span class=\"italic\">+c</span></a>)</span>';
				$(label).append(result);
				
			}
			}
	}); 

});



function show_siding_damage_amount_inputs(el, types, toggle) {
    content = "";

    if (el[0].checked == 1) {
        types.each(function() {
            if ($(this)[0].checked === true) {
                content += "<div class=\"row\"><label for=\"" + $(this).next().text().toLowerCase() + "_damage\">" + $(this).next().text() + " Damage: </label>" +
                                "<div class=\"right\">" +
                                "<input type=\"text\" value=\"\" /></div></div>";
            }
        });

        if (toggle) {
            $('.siding-build').toggle(800).html(content);
        } else {
            $('.siding-build').html(content);
        }
        
    }
}



function get_slope_statements(el, house_directional, subs, stmts) {
    var statements = stmts[house_directional];
    var count = 0;
    
    for(var statement in statements) {
        statements[statement] = statements[statement].replace("{{house_face}}", subs[count]);

        count++;
    }

    return statements;
}



