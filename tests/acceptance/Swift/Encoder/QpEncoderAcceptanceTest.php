<?php

require_once 'Swift/Encoder/QpEncoder.php';
require_once 'Swift/CharacterStream.php';

Mock::generate('Swift_CharacterStream', 'Swift_MockCharacterStream');

class Swift_Encoder_QpEncoderAcceptanceTest extends UnitTestCase
{
  
  private $_encoder;
  private $_charset = 'utf-8';
  private $_charStream;
  
  public function setUp()
  {
    $this->_charStream = new Swift_MockCharacterStream();
    $this->_encoder = new Swift_Encoder_QpEncoder($this->_charset,
      $this->_charStream);
  }
  
  public function testEncodingAndDecodingLongUtf8String()
  {
    $lipsum =
    'Код одно гринспана руководишь на. Его вы знания движение. Ты две начать ' .
    'одиночку, сказать основатель удовольствием но миф. Бы какие система тем. ' .
    'Полностью использует три мы, человек клоунов те нас, бы давать творческую' .
    ' эзотерическая шеф.' .
    'Мог не помнить никакого сэкономленного, две либо какие пишите бы. Должен ' .
    'компанию кто те, этот заключалась проектировщик не ты. Глупые периоды ты' .
    ' для. Вам который хороший он. Те любых кремния концентрируются мог, ' .
    'собирать принадлежите без вы.' .

    'Джоэла меньше хорошего вы миф, за тем году разработки. Даже управляющим ' .
    'руководители был не. Три коде выпускать заботиться ну. То его система ' .
    'удовольствием безостановочно, или ты главной процессорах. Мы без джоэл ' .
    'знания получат, статьи остальные мы ещё.' .
    'Них русском касается поскольку по, образование должником ' .
    'систематизированный ну мои. Прийти кандидата университет но нас, для бы ' .
    'должны никакого, биг многие причин интервьюирования за. ' .
    'Тем до плиту почему. Вот учёт такие одного бы, об биг разным внешних ' .
    'промежуток. Вас до какому возможностей безответственный, были погодите бы' .
    ' его, по них глупые долгий количества.';
    
    $encodedLipsum = $this->_encoder->encodeString($lipsum);
    
    $this->assertEqual(
      quoted_printable_decode($encodedLipsum), $lipsum,
      '%s: Encoded string should decode back to original string'
      );
  }
  
}