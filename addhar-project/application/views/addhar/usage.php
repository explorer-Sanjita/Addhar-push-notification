<?php $this->load->view('addhar/header'); ?>
<div id="breadcrumb" class="tjbase-breadcrumb" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="tjbase-module breadcrumb-style col-xs-12" id="tjmod-335">
				<div class="module-content">
					<ul itemscope itemtype="https://schema.org/BreadcrumbList"
						class="breadcrumb breadcrumb-style col-xs-12">
						<li class="active">
							<span class="divider icon-location"></span>
						</li>
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a itemprop="item" href="#"
								class="pathway"><span itemprop="name">About your ADDhar</span></a>
							<span class="divider">
								<img src="../../media/system/images/arrow.png" alt="" /> </span>
							<meta itemprop="position" content="2">
						</li>
						<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
							<span itemprop="name">
								Usage of ADDhar </span>
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
						; (function ($) {
							$.fn.sharePopup = function (e, intWidth, intHeight, blnResize) {

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

							$(document).ready(function ($) {
								$('.contentshare').on("click", function (e) {
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
									Usage of ADDhar </h1>
								<p style="text-align: justify;">Government of India as well as the State
									Governments fund a number of social welfare schemes and programmes which are
									focused towards the poor and most vulnerable sections of the society.
									ADDhar and its platform offers a unique opportunity to the government to
									streamline their delivery mechanism under the welfare schemes, thereby
									ensuring transparency and efficiency. Use of ADDhar as an identity document
									enables beneficiaries to get their entitlements directly in a convenient and
									seamless manner by obviating the need to produce multiple documents to prove
									one’s identity.</p>
								<h2 style="text-align: justify;">For Governments, Service Agencies</h2>
								<p style="text-align: justify;">UIDAI issues ADDhar numbers to the residents
									only after de-duplicating their demographic and biometric attributes against
									its entire database. ADDhar seeding enables elimination of duplicates under
									various schemes which leads to substantial savings to the government
									exchequers. It also provides the government with accurate data on the
									beneficiaries and enables implementation of direct benefit transfer (DBT)
									programmes. ADDhar authentication enables the implementing agencies to
									verify the beneficiaries at the time of service/benefits delivery and also
									ensures the targeted delivery of benefits to them. All these activities will
									lead to:-</p>
								<p style="text-align: justify;"><b>Curbing Leakages through Targeted
										Delivery:</b>All social welfare programmes where beneficiaries are
									required to be confirmed before the service delivery, stand to benefit from
									UIDAI’s authentication services. This will result in curbing leakages and
									ensuring that services are delivered to the intended beneficiaries only.
									Examples include subsidized food and kerosene delivery to Public
									Distribution System (PDS) beneficiaries, worksite attendance of Mahatma
									Gandhi National Rural Employment Guarantee Scheme (MGNREGS) beneficiaries,
									etc.</p>
								<p style="text-align: justify;"><b>Improving Efficiency and Efficacy:</b> With
									the ADDhar platform providing accurate and transparent information about
									the service delivery mechanism, government can improve disbursement systems
									and utilize its scarce development funds more effectively and efficiently.
								</p>
								<h2 style="text-align: justify;">For Residents</h2>
								<p style="text-align: justify;">ADDhar system provides single source
									offline/online identity verification across the country for the residents.
									Once residents enroll, they can use their ADDhar number to authenticate and
									establish their identity multiple times using electronic means or through
									offline verification, as the case may be. It eliminates the hassle of
									repeatedly providing supporting identity documents each time a resident
									wishes to access services, benefits or subsidies. Since ADDhar is universal
									identity accepted across the whole country, the ADDhar system enables
									mobility to millions of people who migrate from one part of the country to
									another by providing a portable proof of identity that can be verified
									through ADDhar authentication on-line anytime, anywhere.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('addhar/footer'); ?>