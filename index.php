<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="robots" content="noindex">
<title>NOOBS SP — Multi Task Bypass</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
<style>
  * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; -webkit-tap-highlight-color:transparent; }

  html, body {
    min-height: 100vh; width: 100%;
    background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
    background-size: 400% 400%;
    animation: bgMove 15s ease infinite;
    color: #fff; display: flex; justify-content: center; align-items: center;
    padding: 20px;
  }
  @keyframes bgMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }
  body::before, body::after {
    content:''; position: fixed; border-radius: 50%;
    filter: blur(80px); z-index: 0; opacity: 0.5;
    animation: float 8s ease-in-out infinite; pointer-events: none;
  }
  body::before { width: 300px; height: 300px; background: #ff00cc; top: -80px; left: -80px; }
  body::after  { width: 300px; height: 300px; background: #00e0ff; bottom: -80px; right: -80px; animation-delay: 2s; }
  @keyframes float {
    0%,100% { transform: translate(0,0) scale(1); }
    50% { transform: translate(20px,-20px) scale(1.1); }
  }

  .container {
    position: relative; z-index: 2; width: 100%; max-width: 400px;
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
    border-radius: 24px; border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 20px 60px rgba(0,0,0,0.6);
    padding: 30px 22px 28px;
    animation: slideUp 0.7s ease;
  }
  @keyframes slideUp {
    from { opacity:0; transform: translateY(30px); }
    to { opacity:1; transform: translateY(0); }
  }

  .logo-wrap { display: flex; justify-content: center; margin-bottom: 15px; }
  .logo {
    width: 80px; height: 80px; border-radius: 50%; padding: 3px;
    background: linear-gradient(135deg, #ff00cc, #00e0ff);
    box-shadow: 0 0 25px rgba(255,0,204,0.5), 0 0 40px rgba(0,224,255,0.3);
    animation: pulse 2s infinite; overflow: hidden;
  }
  @keyframes pulse {
    0%,100% { box-shadow: 0 0 25px rgba(255,0,204,0.5), 0 0 40px rgba(0,224,255,0.3); }
    50% { box-shadow: 0 0 35px rgba(255,0,204,0.8), 0 0 60px rgba(0,224,255,0.5); }
  }
  .logo img { width: 100%; height: 100%; border-radius: 50%; object-fit: cover; display: block; }

  .title {
    text-align: center; font-size: 22px; font-weight: 800; letter-spacing: 1px;
    background: linear-gradient(90deg, #ff00cc, #00e0ff, #ff00cc);
    background-size: 200% auto;
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text; animation: shine 3s linear infinite; margin-bottom: 6px;
  }
  @keyframes shine { to { background-position: 200% center; } }
  .subtitle {
    text-align: center; font-size: 12px; color: rgba(255,255,255,0.55);
    letter-spacing: 2px; margin-bottom: 18px; text-transform: uppercase;
  }

  .counter-box {
    display: flex; align-items: center; justify-content: space-between;
    background: linear-gradient(135deg, rgba(0,224,255,0.12), rgba(255,0,204,0.12));
    border: 1px solid rgba(0,224,255,0.3);
    border-radius: 14px; padding: 12px 16px; margin-bottom: 18px;
    animation: glowSoft 3s ease-in-out infinite;
  }
  @keyframes glowSoft {
    0%,100% { box-shadow: 0 0 15px rgba(0,224,255,0.15); }
    50% { box-shadow: 0 0 25px rgba(255,0,204,0.3); }
  }
  .counter-label {
    font-size: 12px; color: rgba(255,255,255,0.7);
    letter-spacing: 1px; text-transform: uppercase; font-weight: 600;
  }
  .counter-value {
    font-size: 22px; font-weight: 800;
    background: linear-gradient(90deg, #00e0ff, #ff00cc);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text; display: flex; align-items: center; gap: 6px;
  }
  .counter-value .dot {
    width: 8px; height: 8px; background: #00ff88;
    border-radius: 50%; box-shadow: 0 0 10px #00ff88; animation: blink 1.5s infinite;
  }
  @keyframes blink { 0%,100% { opacity: 1; } 50% { opacity: 0.3; } }

  form { display: flex; flex-direction: column; gap: 14px; }

  .select-box { position: relative; }
  .select-box::after {
    content: '▼'; position: absolute; right: 18px; top: 50%;
    transform: translateY(-50%); color: #00e0ff; font-size: 10px;
    pointer-events: none;
  }
  .select-box select {
    width: 100%; padding: 15px 40px 15px 16px;
    background: rgba(255,255,255,0.07);
    border: 2px solid rgba(0,224,255,0.3);
    border-radius: 14px; color: #fff; font-size: 13px; outline: none;
    transition: all 0.3s; font-family: 'Poppins', sans-serif;
    cursor: pointer; appearance: none; -webkit-appearance: none;
  }
  .select-box select:focus {
    border-color: #00e0ff;
    background: rgba(0,224,255,0.08);
    box-shadow: 0 0 0 4px rgba(0,224,255,0.15);
  }
  .select-box select option {
    background: #1a1a3e; color: #fff; padding: 10px;
  }

  /* URL Hint Box */
  .url-hint {
    display: none;
    background: linear-gradient(135deg, rgba(255,0,204,0.12), rgba(0,224,255,0.12));
    border: 1.5px dashed rgba(0,224,255,0.5);
    border-radius: 14px;
    padding: 14px 16px;
    animation: fadeIn 0.35s ease;
  }
  .url-hint.active { display: block; }
  @keyframes fadeIn {
    from { opacity:0; transform: translateY(-8px); }
    to { opacity:1; transform: translateY(0); }
  }
  .url-hint .hint-title {
    font-size: 11px;
    color: #00e0ff;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    font-weight: 700;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .url-hint .hint-task {
    font-size: 14px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 8px;
  }
  .url-hint .hint-task .coins {
    background: linear-gradient(90deg, #ff00cc, #00e0ff);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 800;
  }
  .url-hint .hint-url-label {
    font-size: 11px;
    color: rgba(255,255,255,0.6);
    margin-bottom: 4px;
  }
  .url-hint .hint-url {
    display: block;
    background: rgba(0,0,0,0.35);
    border: 1px solid rgba(0,224,255,0.3);
    padding: 9px 12px;
    border-radius: 10px;
    font-family: monospace;
    font-size: 11px;
    color: #6bffb8;
    word-break: break-all;
    line-height: 1.5;
  }
  /* ❌ hint-param CSS hata diya */

  .input-box { position: relative; }
  .input-box input {
    width: 100%; padding: 15px 16px;
    background: rgba(255,255,255,0.07);
    border: 2px solid rgba(255,255,255,0.12);
    border-radius: 14px; color: #fff; font-size: 14px;
    outline: none; transition: all 0.3s; font-family: 'Poppins', sans-serif;
  }
  .input-box input::placeholder { color: rgba(255,255,255,0.35); }
  .input-box input:focus {
    border-color: #00e0ff;
    background: rgba(0,224,255,0.08);
    box-shadow: 0 0 0 4px rgba(0,224,255,0.15);
  }

  .btn {
    width: 100%; padding: 15px; border: none; border-radius: 14px;
    font-size: 15px; font-weight: 700; letter-spacing: 1px;
    cursor: pointer; text-align: center; text-decoration: none;
    display: block; color: #fff; transition: all 0.3s ease;
    position: relative; overflow: hidden; font-family: 'Poppins', sans-serif;
  }
  .btn-submit {
    background: linear-gradient(135deg, #ff00cc, #ff5e62);
    box-shadow: 0 8px 25px rgba(255,0,204,0.4);
  }
  .btn-submit:hover, .btn-submit:active {
    transform: translateY(-2px);
    box-shadow: 0 12px 35px rgba(255,0,204,0.6);
  }
  .btn-tg {
    background: linear-gradient(135deg, #00e0ff, #0072ff);
    box-shadow: 0 8px 25px rgba(0,224,255,0.4);
  }
  .btn-tg:hover, .btn-tg:active {
    transform: translateY(-2px);
    box-shadow: 0 12px 35px rgba(0,224,255,0.6);
  }

  .msg, .error {
    padding: 14px 16px; border-radius: 14px;
    font-size: 13px; font-weight: 600; text-align: center;
    word-break: break-all; margin-top: 6px;
    animation: fadeIn 0.4s ease;
  }
  .msg {
    background: linear-gradient(135deg, rgba(0,224,255,0.15), rgba(0,255,150,0.15));
    border: 1px solid rgba(0,255,150,0.4); color: #6bffb8;
  }
  .error {
    background: linear-gradient(135deg, rgba(255,0,80,0.15), rgba(255,100,100,0.15));
    border: 1px solid rgba(255,80,80,0.4); color: #ff6b6b;
  }

  .popup {
    position: fixed; inset: 0; background: rgba(0,0,0,0.75);
    backdrop-filter: blur(6px); display: flex;
    justify-content: center; align-items: center;
    z-index: 9999; opacity: 0; visibility: hidden;
    transition: all 0.35s ease; padding: 20px;
  }
  .popup.active { opacity: 1; visibility: visible; }
  .popup-box {
    width: 100%; max-width: 350px;
    background: linear-gradient(135deg, rgba(48,43,99,0.95), rgba(15,12,41,0.95));
    border: 1px solid rgba(0,224,255,0.3);
    border-radius: 20px; padding: 25px 22px; text-align: center;
    box-shadow: 0 20px 60px rgba(0,224,255,0.3);
    transform: scale(0.85);
    transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    max-height: 85vh; overflow-y: auto;
  }
  .popup.active .popup-box { transform: scale(1); }
  .popup-box h2 {
    font-size: 20px; margin-bottom: 12px;
    background: linear-gradient(90deg, #ff00cc, #00e0ff);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  .popup-box p { font-size: 13px; color: rgba(255,255,255,0.75); line-height: 1.6; margin-bottom: 8px; }
  .popup-box button {
    margin-top: 15px; padding: 11px 30px; border: none;
    border-radius: 12px; background: linear-gradient(135deg, #ff00cc, #00e0ff);
    color: #fff; font-weight: 700; font-size: 14px; cursor: pointer;
    box-shadow: 0 6px 20px rgba(255,0,204,0.4);
    transition: transform 0.2s; font-family: 'Poppins', sans-serif;
  }
  .popup-box button:active { transform: scale(0.95); }

  .footer {
    text-align: center; margin-top: 20px; font-size: 11px;
    color: rgba(255,255,255,0.35); letter-spacing: 1px;
  }
</style>
</head>
<body>

<!-- Popup -->
<div id="popup" class="popup">
  <div class="popup-box">
    <h2>⚡ Welcome NOOBS SP ⚡</h2>
    <p><b>Step 1:</b> Task select karo 👇</p>
    <p><b>Step 2:</b> URL hint dekh ke sahi URL paste karo</p>
    <p><b>Step 3:</b> BYPASS NOW dabao 🚀</p>
    <button onclick="closePopup()">OK SAMJHA</button>
  </div>
</div>

<div class="container">

  <div class="logo-wrap">
    <div class="logo">
      <img src="https://noobssp.fun/A/IMG_20261004_143921_747.jpg" alt="logo">
    </div>
  </div>

  

  <?php
  error_reporting(0);

  $tasks = [
    1 => [
        'name'       => 'Survey Questionnaire 2100',
        'coins'      => 2100,
        'ymid_param' => 'ymid',
        'hint'       => 'https://1buv.com/',
        'pb_url'     => 'http://cpipb.wldon.com/?clickid=XXXX'
    ],
    2 => [
        'name'       => 'Survey Questionnaire 3100',
        'coins'      => 3100,
        'ymid_param' => 'cid',
        'hint'       => 'https://m.bolomp31.click/',
        'pb_url'     => 'http://cpipb.wldon.com/?clickid=XXXX'
    ],
    3 => [
        'name'       => 'Survey Questionnaire 3000',
        'coins'      => 3000,
        'ymid_param' => 'ymid',
        'hint'       => 'https://74pd.com/',
        'pb_url'     => 'http://pb.bytemobi.net/pb/lsr?transaction_id=XXXX'
    ],
    4 => [
        'name'       => 'Survey Questionnaire 1400',
        'coins'      => 1400,
        'ymid_param' => 'ymid',
        'hint'       => 'https://0wdb.com/',
        'pb_url'     => 'http://cpipb.cleverups.com?adv=1000696&clickid=XXXX'
    ],
    5 => [
        'name'       => 'Survey Questionnaire 1200',
        'coins'      => 1200,
        'ymid_param' => 's1',
        'hint'       => 'http://litchiads.fusetracking.com/',
        'pb_url'     => 'http://pb.imxbidding.net/pb/lsr?transaction_id=XXXX'
    ],
    6 => [
        'name'       => 'Survey Questionnaire 2700',
        'coins'      => 2700,
        'ymid_param' => 'ymid',
        'hint'       => 'https://ldl1.com/',
        'pb_url'     => 'http://cpipb.wldon.com/?clickid=XXXX'
    ],
    7 => [
        'name'       => 'Jaya Slot 1750',
        'coins'      => 1750,
        'ymid_param' => 'clickid',
        'hint'       => 'https://postback.milengine.com/',
        'pb_url'     => 'https://postback.milengine.com/?clickid=XXXX'
    ],
    8 => [
        'name'       => 'Alpari 1150',
        'coins'      => 1150,
        'ymid_param' => 'clickid',
        'hint'       => 'https://app.appsflyer.com/',
        'pb_url'     => 'https://postback.milengine.com/?clickid=XXXX'
    ],
    9 => [
        'name'       => 'FC 1150',
        'coins'      => 1150,
        'ymid_param' => 'aff_sub1',
        'hint'       => 'https://toptopoffer.linkrall-trk.com/',
        'pb_url'     => 'http://cpipb.cleverups.com?adv=1000696&clickid=XXXX'
    ],
  ];

  $counter_file = __DIR__ . '/bypass_counter.txt';
  if (!file_exists($counter_file)) {
      file_put_contents($counter_file, '0');
  }
  $total_bypass = (int) file_get_contents($counter_file);
  ?>

  <div class="counter-box">
    <span class="counter-label">🔥 Total Bypass</span>
    <span class="counter-value">
      <span class="dot"></span>
      <?php echo $total_bypass; ?>
    </span>
  </div>

  <?php
  if (!isset($_GET['refer'])) { ?>

    <form action="?" method="GET" autocomplete="off">

      <div class="select-box">
        <select name="task" id="taskSelect" required onchange="showHint(this.value)">
          <option value="">-- Select Task --</option>
          <?php foreach ($tasks as $id => $t) { ?>
            <option value="<?php echo $id; ?>">
              🎯 Task <?php echo $id; ?> — <?php echo $t['name']; ?>
            </option>
          <?php } ?>
        </select>
      </div>

      <!-- URL Hint Box (bina Extract line ke) -->
      <div class="url-hint" id="urlHint">
        <div class="hint-title">📌 IS TYPE KA URL DAALO</div>
        <div class="hint-task" id="hintTask"></div>
        <div class="hint-url-label">Es Typ Full Url Past</div>
        <code class="hint-url" id="hintUrl"></code>
      </div>

      <div class="input-box">
        <input placeholder="Enter Url" type="text" name="refer" required />
      </div>

      <button class="btn btn-submit" name="submit" type="submit" value="SUBMIT">🚀 BYPASS NOW</button>
      <a href="https://t.me/+f0bjgqdfPGZjYWU1" class="btn btn-tg" target="_blank">📢 JOIN TELEGRAM</a>
    </form>

  <?php } else {
      $refer = trim($_GET['refer']);
      $task_id = (int)($_GET['task'] ?? 0);

      if (!isset($tasks[$task_id])) {
          echo "<div class='error'>❌ Invalid Task Selected!</div>";
          echo "<script>setTimeout(function(){ window.location.replace('https://t.me/+f0bjgqdfPGZjYWU1'); }, 2000);</script>";
      } else {
          $selected = $tasks[$task_id];
          $param    = $selected['ymid_param'];

          $clickid = '';
          if (strpos($refer, $param . '=') !== false) {
              $nn = explode($param . '=', $refer)[1];
              $clickid = explode('&', $nn)[0];
              $clickid = trim($clickid);
          }

          if (empty($clickid)) {
              echo "<div class='error'>❌ Invalid Link! Sahi URL daalo.</div>";
              echo "<script>setTimeout(function(){ window.location.replace('https://t.me/+f0bjgqdfPGZjYWU1'); }, 3000);</script>";
          } else {
              $pb_url = str_replace('XXXX', $clickid, $selected['pb_url']);

              $headers = [
                  'User-Agent: HttpCanary/3.3.6',
                  'vserv1.g2afse.com',
                  'Accept: */*'
              ];

              $ch77 = curl_init();
              curl_setopt($ch77, CURLOPT_URL, $pb_url);
              curl_setopt($ch77, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch77, CURLOPT_HTTPHEADER, $headers);
              curl_setopt($ch77, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($ch77, CURLOPT_FOLLOWLOCATION, true);
              curl_setopt($ch77, CURLOPT_TIMEOUT, 20);
              $output1 = curl_exec($ch77);
              curl_close($ch77);

              $is_error = (
                  $output1 === false ||
                  stripos($output1, 'error') !== false ||
                  stripos($output1, 'repeat') !== false ||
                  stripos($output1, 'invalid') !== false
              );

              echo "<div style='text-align:center;font-size:12px;color:#00e0ff;margin-bottom:8px;letter-spacing:1px;'>"
                 . "🎯 " . htmlspecialchars($selected['name']) . " • " . $selected['coins'] . " coins</div>";

              if ($is_error) {
                  echo "<div class='error'>⚠️ " . htmlspecialchars($output1 ?: 'No response / Timeout') . "</div>";
              } else {
                  $total_bypass++;
                  file_put_contents($counter_file, $total_bypass);
                  echo "<div class='msg'>✅ " . htmlspecialchars($output1 ?: 'Success') . "</div>";
              }
              echo "<script>setTimeout(function(){ window.location.replace('https://t.me/+f0bjgqdfPGZjYWU1'); }, 3500);</script>";
          }
      }
  } ?>

  <div class="footer"></div>
</div>

<script>
  const taskData = <?php echo json_encode(array_map(function($t){
      return [
          'name'  => $t['name'],
          'coins' => $t['coins'],
          'hint'  => $t['hint']
      ];
  }, $tasks)); ?>;

  function showHint(taskId) {
    const hintBox   = document.getElementById('urlHint');
    const hintTask  = document.getElementById('hintTask');
    const hintUrl   = document.getElementById('hintUrl');

    if (!taskId || !taskData[taskId]) {
      hintBox.classList.remove('active');
      return;
    }

    const t = taskData[taskId];
    hintTask.innerHTML  = t.name + ' — <span class="coins">' + t.coins + ' coins</span>';
    hintUrl.textContent = t.hint;
    hintBox.classList.add('active');
  }

  window.addEventListener('load', () => {
    if (!localStorage.getItem('noobs_popup_seen_v3')) {
      document.getElementById('popup').classList.add('active');
    }
  });
  function closePopup() {
    document.getElementById('popup').classList.remove('active');
    localStorage.setItem('noobs_popup_seen_v3', '1');
  }
</script>

</body>
</html>