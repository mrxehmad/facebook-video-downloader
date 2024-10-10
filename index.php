<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Video Downloader</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Facebook Video Downloader</h2>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="videoUrl" class="form-label">Enter Facebook Video URL:</label>
                        <input type="url" class="form-control" id="videoUrl" name="videoUrl" placeholder="https://www.facebook.com/video-url" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Download Video</button>
                </form>
            </div>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $videoUrl = $_POST['videoUrl'];

            function fetchFacebookVideo($url) {
                $mobileUserAgent = "Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14E304 Safari/602.1";
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_USERAGENT, $mobileUserAgent);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close($ch);

                return $result;
            }

            function extractVideoUrl($html) {
                $pattern = '/https:\/\/video\.xx\.fbcdn\.net\/[^"]+\.mp4[^"]*/';
                if (preg_match($pattern, $html, $matches)) {
                    return $matches[0]; 
                }
                return false;
            }

            $htmlContent = fetchFacebookVideo($videoUrl);

            $videoDownloadUrl = extractVideoUrl($htmlContent);

            if ($videoDownloadUrl) {
                echo "<div class='alert alert-success mt-4'>Video is ready for download!</div>";
                echo "<a href='$videoDownloadUrl' class='btn btn-success w-100' download>Download Now</a>";
            } else {
                echo "<div class='alert alert-danger mt-4'>Failed to retrieve the video. Ensure the URL is correct or the video is public.</div>";
            }
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
