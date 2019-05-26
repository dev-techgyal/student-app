<?php

namespace App\Http\Controllers;

use App\Files;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Webpatser\Uuid\Uuid;

class SystemController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * returns the elapsed time
	 * @param $updatedAt
	 * @return false|string
	 */
	public static function elapsedTime($updatedAt) {
		return Carbon::parse()->diffForHumans($updatedAt);
	}

	/**
	 * Write the system log files
	 * @param array $data
	 * @param string $channel
	 * @param string $fileName
	 * @throws \Exception
	 */
	public static function log(array $data, string $channel, string $fileName) {
		$date = date('Y-m-d');
		$file = storage_path('logs/' . $fileName . '.log');

		// finally, create a formatter
		$formatter = new JsonFormatter();

		// Create the log data
		$log = [
			'ip' => request()->getClientIp(),
			'data' => $data,
		];
		// Create a handler
		$stream = new StreamHandler($file, Logger::INFO);
		$stream->setFormatter($formatter);

		// bind it to a logger object
		$securityLogger = new Logger($channel);
		$securityLogger->pushHandler($stream);
		$securityLogger->addInfo('info', $log);
	}

	/**
	 * store file paths
	 * here
	 * @param $request
	 * @param string $user_id
	 * @return bool
	 * @throws \Exception
	 */
	public static function storeStudentFiles($request, string $user_id) {
		//get table name
		$fileTable = new Files();
		$tableName = $fileTable->getTable();

		$files = DB::table($tableName)->insert([
			'id' => Uuid::generate()->string,
			'user_id' => $user_id,
			'file_paths' => json_encode([
				'image' => self::store($request, true, false),
				'certificate' => self::store($request, false, true),
			]),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);

		if ($files)
			return true;
		return false;
	}

	/**
	 * store image here
	 * @param $request
	 * @param bool $image
	 * @param bool $certificate
	 * @return mixed
	 * @throws \Exception
	 */
	public static function store($request, bool $image, bool $certificate) {
		$uniqueCode = null;
		if ($image) {
			$image = $request->image;
			$uniqueCode = Uuid::generate()->string;
		}
		if ($certificate) {
			$image = $request->certificate;
			$uniqueCode = Uuid::generate()->string;
		}

		$fileNameWithExt = $image->getClientOriginalName();
		$filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
		$extension = $image->getClientOriginalExtension();
		$fileNameToStore = $filename . '_' . $uniqueCode . '_' . time() . '.' . $extension;
		$fileUploaded = str_replace([" ", '!', ";",], '_', $fileNameToStore);
		$image->move(public_path('student_files'), $fileUploaded);

		return $fileUploaded;
	}
}
