<div class="movie-thumbnail" id="<?php echo $row['hide_name'] . '-box'; ?>">
	<div class="movie-thumb-content">
		<div class="thumb-cover"></div>
		<div class="thumb-items">
			<div class="thumb-top">
				<span class="rate-label-bg"></span>
				<span class="rate-label" id="<?php echo $row['hide_name'] . '-rate'; ?>"><?php echo $rated; ?></span>
				<div class="uploaded-movie-icon-box">
					<span class="tooltip"><?php echo $row['uploaded']; ?></span>
					<div class="uploaded-movie-icon">
						<img src="images/icons/uploaded_movie.png" alt=""/>
					</div>
				</div>
				<div class="thumb-top-h">
					<span class="movie-text movie-name"><?php echo utf8_encode($row['name']); ?></span><br/>
					<span class="movie-text movie-release"><?php echo $row['release_date']; ?></span>
				</div>
			</div>
			<div class="thumb-bottom">
				<div class="thumb-bottom-h">
					<div class="thumb-button play-btn-thumb">
						<span class="tooltip">Film lejátszása</span>
						<div id="play-movie-btn" data-movie-name="<?php echo $row['hide_name']; ?>" onclick="playMovie(this)">
							<img src="images/icons/play-btn-thumb.png" alt=""/>
						</div>
					</div>
					<div class="thumb-button add-to-thumb">
						<span class="tooltip">Hozzáadás listához</span>
						<img src="images/icons/add-to-thumb.png" alt=""/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<img src="images/posters/<?php echo $row['hide_name'] . '.jpg'; ?>" width="150" height="220" id="<?php echo $row['hide_name'] . '-img'; ?>"/>
</div>
