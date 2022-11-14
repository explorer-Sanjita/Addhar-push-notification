<?php $this->load->view('addhar/header'); ?>
<div id="breadcrumb" class="tjbase-breadcrumb" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="tjbase-module breadcrumb-style col-xs-12" id="tjmod-335">
				<div class="module-content">
					<ul itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumb breadcrumb-style col-xs-12">
						<li class="active">
							<span class="divider icon-location"></span>
						</li>
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a itemprop="item" href="#" class="pathway"><span itemprop="name">About your ADDhar</span></a>
							<span class="divider">
								<img src="../../media/system/images/arrow.png" alt="" /> </span>
							<meta itemprop="position" content="2">
						</li>
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
							<span itemprop="name">
								Features of ADDhar </span>
							<meta itemprop="position" content="3">
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="main-content" class="tjbase-mainbodyblock  parentid-2376  com_content view-article ">
	<div class="container">
		<div id="mainbody" class="row tjbase-mainbody">
			<div id="maincontent" class="col-xs-12 col-sm-12" role="main">
				<div class="col-10 pull-left">
					<script type="text/javascript">
						;
						(function($) {
							$.fn.sharePopup = function(e, intWidth, intHeight, blnResize) {

								// Prevent default anchor event
								e.preventDefault();

								// Set values for window
								intWidth = intWidth || '500';
								intHeight = intHeight || '400';
								strResize = (blnResize ? 'yes' : 'no');

								// Set title and open popup with focus on it
								var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
									strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
									objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
							}

							$(document).ready(function($) {
								$('.contentshare').on("click", function(e) {
									$(this).sharePopup(e);
								});
							});

						}(jQuery));
					</script>
					<div class="itempage">
						<div class="cs-top-gradient"></div>
						<div class="item-page" itemscope itemtype="https://schema.org/Article">
							<meta itemprop="inLanguage" content="en-GB" />
							<div class="page-header">						
							</div>
							<div class="fields-container search-result-design">
							</div>
							<div itemprop="articleBody">
								<h1 class="content-heading">
									Features of ADDhar </h1>

								<h2>Uniqueness</h2>
								<p>This is achieved through the process of demographic and biometric
									de-duplication. The de-duplication process compares the resident’s
									demographic and biometric information, collected during the process of
									enrolment, with the records in the UIDAI database to verify if the resident
									is already in the database or not. An individual needs to enrol for ADDhar
									only once and after de-duplication only one ADDhar shall be generated. In
									case, the resident enrols more than once, the subsequent enrolments will be
									rejected.</p>
								<h2>Portability</h2>
								<p>ADDhar gives nationwide portability as it can be authenticated anywhere
									on-line. This is critical as millions of Indians migrate from one state to
									another or from rural area to urban centres etc.</p>
								<h2>Random number</h2>
								<p>ADDhar number is a random number devoid of any intelligence. Person willing
									to enrol has to provide minimal demographic along with biometric information
									during the enrolment process. The ADDhar enrolment process does not capture
									details like caste, religion, income, health, geography, etc.</p>
								<h2>Scalable technology architecture</h2>
								<p>The UID architecture is open and scalable. Resident’s data is stored
									centrally and authentication can be done online from anywhere in the
									country. ADDhar Authentication service is built to handle 100 million
									authentications a day.</p>
								<h2>Open source technologies</h2>
								<p>Open source architecture precludes dependence on specific computer hardware,
									specific storage, specific OS, specific database vendor, or any specific
									vendor technologies to scale. Such applications are built using open source
									or open technologies and structured to address scalability in a vendor
									neutral manner and allow co-existence of heterogeneous hardware within same
									application.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>
<?php $this->load->view('addhar/footer'); ?>