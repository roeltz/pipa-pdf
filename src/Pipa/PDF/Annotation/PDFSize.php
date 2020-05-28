<?php

namespace Pipa\PDF\Annotation;
use Pipa\Dispatch\Annotation\Option;
use Pipa\PDF\PDFView;

class PDFSize extends Option {
	public $name = "pdfSize";
	public $value = PDFView::DEFAULT_SIZE;
}
