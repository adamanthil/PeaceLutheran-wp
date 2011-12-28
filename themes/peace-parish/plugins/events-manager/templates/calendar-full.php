<?php 
/*
 * This file contains the HTML generated for full calendars. You can copy this file to yourthemefolder/plugins/events/templates and modify it in an upgrade-safe manner.
 * 
 * There are two variables made available to you: 
 * 
 * 	$calendar - contains an array of information regarding the calendar and is used to generate the content
 *  $args - the arguments passed to EM_Calendar::output()
 * 
 * Note that leaving the class names for the previous/next links will keep the AJAX navigation working.
 */
// ini_set('display_errors', 1);
?>

<?php

/**
 *	Determines if the given event is in the category with the name passed
 *
 *	@param object $event
 *	@param string $category
 *	@return boolean
*/
function inCategory($event, $category) {
	foreach($event->categories as $cat) {
		if($cat->name == $category) {
			return true;
		}
	}
	return false;
}
?>

<style type="text/css">
	#main #content #core {
	    padding: 60px 50px 50px;
	}
	
	table.fullcalendar {
		width: 920px;
	}

	table.fullcalendar tr td {
		background: #fefefe; /* Old browsers */
		background: -moz-linear-gradient(top,  #fefefe 0%, #f1f1f1 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fefefe), color-stop(100%,#f1f1f1)); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  #fefefe 0%,#f1f1f1 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top,  #fefefe 0%,#f1f1f1 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top,  #fefefe 0%,#f1f1f1 100%); /* IE10+ */
		background: linear-gradient(top,  #fefefe 0%,#f1f1f1 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefefe', endColorstr='#f1f1f1',GradientType=0 ); /* IE6-9 */
		border: 1px solid #CCC;
		border-top: 1px solid white;
		height: 120px;
		min-height: 120px;
		width: 120px;
	}
	table.fullcalendar tr td.eventless-today,
	table.fullcalendar tr td.eventfull-today {
		background: #E3E3E3;
	}
		table.fullcalendar tr.first td {
			border-top: 1px solid #CCC;
			height: 60px;
			font-size: 20px;
			text-align: center;
		}
		table.fullcalendar tr td.days {
			vertical-align: top;
		}
	table.fullcalendar tr.days-names td {
		text-align: center;
		height: 30px;
		min-height: 40px;
	}
	table.fullcalendar div.container {
		min-height: 116px;
	}
	
	table.fullcalendar div.container div.daily-items {
		margin-top: 1px;
	}
	
	table.fullcalendar div.container ul {
		padding-top: 15px;
	}
	
	table.fullcalendar td.eventful a.date, 
	table.fullcalendar td.eventful-today a.date,
	table.fullcalendar td.eventful-pre a.date,
	table.fullcalendar td.eventful-post a.date {
		display: block;
		color: #333;
	}
		table.fullcalendar td.eventful-pre a.date {
			color: #CCC;
		}
	table.fullcalendar td.eventful ul, 
	table.em-calendar td.eventful-today ul,
	table.em-calendar td.eventful-pre ul,
	table.em-calendar td.eventful-post ul {
		padding: 0;
		margin: 5px 0;
		list-style-type: none;
	}
	table.fullcalendar td.eventful ul li, 
	table.em-calendar td.eventful-today ul li,
	table.em-calendar td.eventful-pre ul li,
	table.em-calendar td.eventful-post ul li {
		font-size: 13px;
		color: #666;
		text-indent: -5px;
		padding-left: 5px;
		font-family: ff-meta-web-pro, verdana, sans-serif;
		line-height: 1.1;
		margin-bottom: 5px;
	}
		table.fullcalendar td.eventful ul li.academy, 
		table.em-calendar td.eventful-today ul li.academy {
			color: #660E11;
		}
		table.fullcalendar td.eventful ul li.cca, 
		table.em-calendar td.eventful-today ul li.cca {
			color: #004D33;
		}
		
		table.fullcalendar td.eventful ul li.service, 
		table.em-calendar td.eventful-today ul li.service,
		table.em-calendar td.eventful-pre ul li.service,
		table.em-calendar td.eventful-post ul li.service {
			font-weight: bold;
		}
		
		table.em-calendar td.eventful-pre ul li,
		table.em-calendar td.eventful-post ul li,
		table.em-calendar td.eventful-pre ul li.academy,
		table.em-calendar td.eventful-post ul li.academy,
		table.em-calendar td.eventful-pre ul li.cca,
		table.em-calendar td.eventful-post ul li.cca {
			color: #CCC;
		}
	
	table.fullcalendar td.eventful ul li.full-day, 
	table.em-calendar td.eventful-today ul li.full-day,
	table.em-calendar td.eventful-pre ul li.full-day,
	table.em-calendar td.eventful-post ul li.full-day {
		width: 115px;
		padding-left: 2px;
		padding-top: 2px;
		background: #EEE;
		border: 1px solid #CCC;
		line-height: 1.1;
		text-indent: 0;
		text-align: center;
	}
	table.fullcalendar td.eventful ul li.heading, 
	table.em-calendar td.eventful-today ul li.heading,
	table.em-calendar td.eventful-pre ul li.heading,
	table.em-calendar td.eventful-post ul li.heading {
		font-style: italic;
		font-variant: small-caps;
		line-height: 1.1;
		text-indent: 0;
		text-align: center;
	}
	
	table.fullcalendar td.eventful em, 
	table.em-calendar td.eventful-today em,
	table.em-calendar td.eventful-pre em,
	table.em-calendar td.eventful-post em {
		font-style: italic;
		font-size: 12px;
		margin-right: 2px;
	}
	table.fullcalendar td.eventful a, 
	table.em-calendar td.eventful-today a,
	table.em-calendar td.eventful-pre a,
	table.em-calendar td.eventful-post a {
		color: #222;
		font-size: 13px;
		text-decoration: none;
	}
	table.em-calendar td.eventful-pre a,
	table.em-calendar td.eventful-post a {
		color: #CCC;
	}
		table.fullcalendar td.eventful ul li.academy a, 
		table.em-calendar td.eventful-today ul li.academy a {
			color: #660E11;
		}
		table.fullcalendar td.eventful ul li.cca a, 
		table.em-calendar td.eventful-today ul li.cca a {
			color: #004D33;
		}
		table.em-calendar td.eventful-pre ul li.academy a,
		table.em-calendar td.eventful-post ul li.academy a,
		table.em-calendar td.eventful-pre ul li.cca a,
		table.em-calendar td.eventful-post ul li.cca a {
			color: #CCC;
		}
	table.fullcalendar tr td a:hover {
		color: #333;
	}
</style>
<table class="em-calendar fullcalendar">
	<thead>
		<tr class="first">
			<td><a class="em-calnav full-link" href="<?php echo $calendar['links']['previous_url']; ?>">&lt;&lt;</a></td>
			<td class="month_name" colspan="5"><?php echo ucfirst(date_i18n('F Y', $calendar['month_start'])); ?></td>
			<td><a class="em-calnav full-link" href="<?php echo $calendar['links']['next_url']; ?>">&gt;&gt;</a></td>
		</tr>
	</thead>
	<tbody>
		<tr class="days-names">
			<td>Sunday</td>
			<td>Monday</td>
			<td>Tuesday</td>
			<td>Wednesday</td>
			<td>Thursday</td>
			<td>Friday</td>
			<td>Saturday</td>
			<?php //echo implode('</td><td>',$calendar['row_headers']); ?>
		</tr>
		<tr>
			<?php
			$col_count = 1; //this counts collumns in the $calendar_array['cells'] array
			$col_max = count($calendar['row_headers']); //each time this collumn number is reached, we create a new collumn, the number of cells should divide evenly by the number of row_headers
			foreach($calendar['cells'] as $date => $cell_data ){
				$class = ( !empty($cell_data['events']) && count($cell_data['events']) > 0 ) ? 'eventful':'eventless';
				if(!empty($cell_data['type'])){
					$class .= "-".$cell_data['type']; 
				}
				?>
				<td class="<?php echo $class; ?> days">
					<div class="container">
						<?php if( !empty($cell_data['events']) && count($cell_data['events']) > 0 ): ?>
						<a class='date' href="<?php echo esc_url($cell_data['link']); ?>" title="<?php echo esc_attr($cell_data['link_title']); ?>"><?php echo date('j',$cell_data['date']); ?></a>
						<div class='daily-items'>
						<ul>
							<?php foreach($cell_data['events'] as $event): ?>
								<?php 
									$format = '<em>#_12HSTARTTIME</em> #_EVENTLINK';
									$fullDay = '';	// Class for full-day events
									$heading = '';	// Class for heading events
								?>
								<?php if($event->start_time == '00:00:00') { $format = '#_EVENTLINK'; $fullDay = 'full-day'; } ?>
								<?php if(inCategory($event, 'Heading')) { $heading = 'heading'; $fullDay = ''; } ?>
								<?php if(inCategory($event, 'Academy')): ?>
								<li class='academy <?php echo $fullDay; ?> <?php echo $heading; ?>'><?php echo EM_Events::output(array($event),array('format'=> $format)); ?></li>
								<?php elseif(inCategory($event, 'Service')): ?>
								<li class='service <?php echo $fullDay; ?> <?php echo $heading; ?>'><?php echo EM_Events::output(array($event),array('format'=> $format)); ?></li>
								<?php elseif(inCategory($event, 'CCA')): ?>
								<li class='cca <?php echo $fullDay; ?> <?php echo $heading; ?>'><?php echo EM_Events::output(array($event),array('format'=> $format)); ?></li>
								<?php else: ?>
								<li class='<?php echo $fullDay; ?> <?php echo $heading; ?>'><?php echo EM_Events::output(array($event),array('format'=> $format)); ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
						</div>
						<?php else:?>
						<?php echo date('j',$cell_data['date']); ?>
						<?php endif; ?>
					</div>
				</td>
				<?php
				//create a new row once we reach the end of a table collumn
				$col_count= ($col_count == $col_max ) ? 1 : $col_count+1;
				echo ($col_count == 1) ? '</tr><tr>':''; 
			}
			?>
		</tr>
	</tbody>
</table>
<a style='float: right;' href="http://peacesussex.org/events.ics">Download .ics file</a>
<script type="text/javascript">
	jQuery(document).ready( function($){
		/* Calendar AJAX */
		$('a.em-calnav, a.em-calnav').live('click', function(e){
			e.preventDefault();
			$(this).closest('.em-calendar-wrapper').prepend('<div class="loading" id="em-loading"></div>');
			var url = em_ajaxify($(this).attr('href'));
			$(this).closest('.em-calendar-wrapper').load(url);
		} ); 
	});
</script>