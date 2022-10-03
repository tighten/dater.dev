<?php

namespace Tests\Unit;

use App\Translator;
use Tests\TestCase;

/**
 * https://github.com/edforshaw/strftimer.com/blob/master/spec/models/translator_spec.rb
 */
class TranslatorTest extends TestCase
{
    /** @test */
    function it_returns_false_if_there_is_no_query()
    {
        $translator = new Translator('');
        $this->assertFalse($translator->valid());
    }

    /** @test */
    function it_returns_false_if_no_translation_has_taken_place()
    {
        $translator = new Translator('foobar');
        $this->assertFalse($translator->valid());
    }

    /** @test */
    function it_returns_true_if_a_translation_can_take_place()
    {
        $translator = new Translator('25 December 2020');
        $this->assertTrue($translator->valid());
    }

    /**
     * @test
     * @dataProvider translations
     */
    function it_translates($input, $expected_output)
    {
        $translator = new Translator($input);
        $this->assertEquals($expected_output, $translator->translation());
    }

    // @todo: Fix these for PHP output
    function translations()
    {
        return [
            ['January', 'F'],
            ['Jan', 'M'],
            ['SEPTEMBER', 'F'],
            ['DEC', 'M'],

            ['Tuesday', 'l'],
            ['Tue', 'D'],
            ['SUNDAY', 'l'],
            ['FRI', 'D'],

            ['2020', 'Y'],
            ['January 2020', 'F Y'],
            ['Jan 2020', 'M Y'],

            ['UTC', 'T'],

            ['0800', 'Hi'],
            ['0959', 'Hi'],

            ['01:13', 'h:i'],
            ['10:13', 'h:i'],
            ['1:13', 'g:i'],

            ['10:13pm', 'h:ia'],
            ['01:13pm', 'h:ia'],
            ['1:13pm', 'g:ia'],
            ['1:13PM', 'g:iA'],
            ['10:13 pm', 'h:i a'],
            ['1:13 pm', 'g:i a'],
            ['1pm', 'ga'],
            ['08am', 'ha'],
            ['5PM', 'gA'],

            ['1st', 'jS'],
            ['1st Jan', 'jS M'],
            ['1st January', 'jS F'],
            ['1st Jan 2020', 'jS M Y'],
            ['1st January 2020', 'jS F Y'],
            ['January 1st 2020', 'F jS Y'],
            ['Tue 1st January 2020', 'D jS F Y'],
            ['Tuesday 1st January 2020', 'l jS F Y'],
            ['Tuesday, 1st January 2020', 'l, jS F Y'],
            ['Mon 31st DEC', 'D jS M'],

            ['1 Jan', 'j M'],
            ['01 Jan', 'd M'],
            ['12 Jan', 'j M'],

            // Converted above here to correct assertions

            // ['Jan 13', 'b y'],
            // ['Jan 09', 'b y'],
            // ['January 13', 'B y'],
            // ['January 09', 'B y'],

            // ['1 Jan 13', '-d b y'],
            // ['13 Jan 13', 'd b y'],
            // ['01 Jan 13', 'd b y'],
            // ['1 Jan 2013', '-d b Y'],
            // ['13 Jan 2013', 'd b Y'],
            // ['01 Jan 2013', 'd b Y'],

            // ['1 January 13', '-d B y'],
            // ['13 January 13', 'd B y'],
            // ['01 January 13', 'd B y'],
            // ['1 January 2020', '-d B Y'],
            // ['13 January 2013', 'd B Y'],
            // ['01 January 2013', 'd B Y'],
            // ['2013 January 2', 'Y B -d'],

            // ['01/01/2013', 'd/m/Y'],
            // ['1/01/2013', '-d/m/Y'],
            // ['10/10/2013', 'd/m/Y'],
            // ['10/13/2013', 'm/d/Y'],
            // ['1/13/2013', '-m/d/Y'],
            // ['01/13/2013', 'm/d/Y'],
            // ['01/12/2013', 'd/m/Y'],
            // ['01/1/2013', 'd/-m/Y'],
            // ['1/9/2013', '-d/-m/Y'],
            // ['1/1/2013', '-d/-m/Y'],
            // ['13/1/2013', 'd/-m/Y'],
            // ['13/01/2013', 'd/m/Y'],
            // ['10/22/18', 'm/d/y'],

            // ['01/01/13', 'd/m/y'],
            // ['01-01-2013', 'd-m-Y'],
            // ['01.01.2013', 'd.m.Y'],

            // ['2013/01/01', 'Y/m/d'],
            // ['2013/9/1', 'Y/-m/-d'],
            // ['2013-01-01', 'Y-m-d'],

            // ['01:13:21', 'H:M:S'],
            // ['10:13:21', 'H:M:S'],
            // ['1:13:21', '-k:M:S'],

            // ['10:13:21pm', 'I:M:SP'],
            // ['01:13:21pm', 'I:M:SP'],
            // ['1:13:21pm', '-l:M:SP'],
            // ['1:13:21PM', '-l:M:Sp'],
            // ['10:13:21 pm', 'I:M:S P'],
            // ['1:13:21 pm', '-l:M:S P'],
            // ['02:35:46 PM', 'I:M:S p'],
            // ['10:13:21.000pm', 'I:M:S.LP'],
            // ['10:13:21.000111pm', 'I:M:S.6NP'],
            // ['10:13:21.1234567pm', 'I:M:S.7NP'],

            // ['23 Jun 2020 at 18:10 BST', 'd b Y at H:M Z'],
            // ['23 Jun 2020 at 18:10 FOO', 'd b Y at H:M FOO'],
            // ['1:23pm CEST', '-l:MP Z'],
            // ['Jun 24, 2020 01:23:45 PM', 'b d, Y I:M:S p'],

            // ['1:11:11:111', '-k:M:S:L'],
            // ['2019-12-31 12:24:02.999', 'Y-m-d H:M:S.L'],
            // ['12:24:02.999 pm', 'I:M:S.L P'],
            // ['11:52 26 Jun 2020', 'H:M d M Y'],
            // ['Mon, 29 Jun 2020 12:34:56 +09:00', 'a, d b Y H:M:S :z'],
            // ['Wed, 15 Jul 2020 12:34:56.00112233 +09:00', 'a, d b Y H:M:S.8N :z'],

            // ['2020-06-26T15:39:30Z', 'Y-m-dTH:M:SZ'],
            // ['2020-06-26T16:40:00.000Z', 'Y-m-dTH:M:S.LZ'],
            // ['2020-07-10T12:34:56.789', 'Y-m-dTH:M:S.L'],
            // ['2020-06-26T16:40:00.000-0100', 'Y-m-dTH:M:S.Lz'],
            // ['2020-06-26T16:40:00.000-01:00', 'Y-m-dTH:M:S.L:z'],
            // ['2020-06-26T16:40:00.000+00:00', 'Y-m-dTH:M:S.L:z'],
            // ['2020-01-06T15:15:48-02:00', 'Y-m-dTH:M:S:z'],
            // ['2020-01-01T00:00:00+0000', 'Y-m-dTH:M:Sz'],
            // ['2020-06-26T16:40:00.000UTC', 'Y-m-dTH:M:S.LZ'],
            // ['20200626T153930Z', 'YmdTHMSZ'],
            // ['2020-07-14T11:11:11.123456', 'Y-m-dTH:M:S.6N'],
            // ['2020-07-14T11:11:11.123456789+03:00', 'Y-m-dTH:M:S.9N:z'],

            // ['', ''],
            // ['some text', 'some text'],
            // ['the %year is %2020%', 'the %year is %Y%'],
        ];
    }
}
