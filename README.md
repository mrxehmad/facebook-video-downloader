# Facebook Video Downloader

This is a simple PHP application that allows users to download Facebook videos by entering the video URL. It fetches the Facebook video page using a mobile user-agent, extracts the direct video download link, and provides the user with the option to download the video in `.mp4` format.

## Features
- **Mobile View Simulation**: Fetches the mobile version of the Facebook page to extract video download links.
- **Video Download**: Allows downloading of publicly available Facebook videos in `.mp4` format.
- **Bootstrap Design**: A clean and responsive design using Bootstrap 5.

## Prerequisites
- **PHP**: You need a web server running PHP (version 7.0+ recommended).
- **cURL**: The PHP cURL extension must be enabled for fetching the video page.
- **Web Server**: Apache, Nginx, or any server that can execute PHP scripts.

## Installation

1. **Clone the repository** or download the source files.
   ```bash
   git clone https://github.com/mrxehmad/facebook-video-downloader.git
   ```

2. **Navigate to the project directory**:
   ```bash
   cd facebook-video-downloader
   ```

3. **Ensure that your web server is set up** to serve PHP files and has `cURL` enabled.

4. **Run the application**:
   - Place the project folder in your web server's root directory (e.g., `htdocs` or `www`).
   - Access the app in the browser by going to:
     ```
     http://localhost/
     ```

## Usage

1. **Enter the Facebook video URL** into the input field.
2. **Click "Download Video"**.
3. If the video URL is correct and the video is publicly available, you will be provided with a download link.

## Limitations

- The downloader only works for publicly available Facebook videos.
- Private or restricted videos cannot be downloaded.
- Facebook's anti-scraping techniques may affect the tool's ability to extract the video URL if they change their HTML structure.

## Disclaimer

- This tool is for educational purposes only. Ensure you comply with Facebook's terms of service.
- Downloading copyrighted or restricted content without permission is illegal in many jurisdictions.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
