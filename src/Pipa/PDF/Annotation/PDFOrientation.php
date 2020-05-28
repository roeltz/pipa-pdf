<?php

namespace Pipa\PDF\Annotation;
use Pipa\Dispatch\Annotation\Option;
use Pipa\PDF\PDFView;

class PDFOrientation extends Option {
	public $name = "pdfOrientation";
	public $value = PDFView::DEFAULT_ORIENTATION;
}
