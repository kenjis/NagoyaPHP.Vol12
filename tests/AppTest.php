<?php
namespace NagoyaPhp\Vol12;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    /**
     * @dataProvider provideData
     */
    public function test($input, $expect)
    {
        $expect = (int) $expect;
        $app = new App();

        $this->assertSame($expect, $app->run($input));
    }

    public function provideData()
    {
        return [
            /*0*/ ['210:Cn,In,Iw,Ap,Iw', '170'],
            /*1*/ ['220:Cp,In', '110'],
            /*2*/ ['230:Cw,In,Iw', '240'],
            /*3*/ ['240:In,An,In', '240'],
            /*4*/ ['250:In,In,Aw,In', '260'],
            /*5*/ ['260:In,In,In,In,Ap', '260'],
            /*6*/ ['270:In,An,In,In,Ip', '410'],
            /*7*/ ['280:Aw,In,Iw,In', '210'],
            /*8*/ ['200:An', '200'],
            /*9*/ ['210:Iw', '60'],
            /*10*/ ['220:Ap', '0'],
            /*11*/ ['230:Cp', '0'],
            /*12*/ ['240:Cw', '60'],
            /*13*/ ['250:In', '130'],
            /*14*/ ['260:Cn', '130'],
            /*15*/ ['270:Ip', '0'],
            /*16*/ ['280:Aw', '140'],
            /*17*/ ['1480:In,An,In,In,In,Iw,Cp,Cw,In,Aw,In,In,Iw,Cn,Aw,Iw', '5920'],
            /*18*/ ['630:Aw,Cw,Iw,An,An', '1740'],
            /*19*/ ['340:Cn,Cn,Ip,Ap', '340'],
            /*20*/ ['240:Iw,Ap,In,Iw,Aw', '120'],
            /*21*/ ['800:Cw,An,Cn,Aw,Ap', '1800'],
            /*22*/ ['1210:An,Ip,In,Iw,An,Iw,Iw,An,Iw,Iw', '3630'],
            /*23*/ ['530:An,Cw,Cw', '810'],
            /*24*/ ['170:Aw,Iw,Ip', '90'],
            /*25*/ ['150:In,Ip,Ip,Iw,In,Iw,Iw,In,An,Iw,Aw,Cw,Iw,Cw,An,Cp,Iw', '580'],
            /*26*/ ['420:Cn,Cw,Cp', '320'],
            /*27*/ ['690:Cw,In,An,Cp,Cn,In', '1220'],
            /*28*/ ['590:Iw,Iw,Cn,Iw,Aw,In,In,Ip,Iw,Ip,Aw', '1200'],
            /*29*/ ['790:Cw,Cn,Cn', '1000'],
            /*30*/ ['1220:In,In,An,An,In,Iw,Iw,In,In,Ip,In,An,Iw', '4590'],
            /*31*/ ['570:Cw,Cn,Cp', '440'],
            /*32*/ ['310:Cn,Cw,An,An,Iw,Cp,Cw,Cn,Iw', '1100'],
            /*33*/ ['910:Aw,In,Iw,Iw,Iw,Iw,Iw,An,Cw,In', '2290'],
            /*34*/ ['460:Iw,Cw,Cw,Cn', '590'],
            /*35*/ ['240:Iw,Iw,In,Iw,In,In,Cn,In,An', '780'],
            /*36*/ ['1240:In,In,In,Ap,In,Cw,Iw,Iw,Iw,Aw,Cw', '2170'],
            /*37*/ ['1000:Iw,Ip,In,An,In,In,In,An,In,Iw,In,In,Iw,In,Iw,Iw,Iw,An', '5500'],
            /*38*/ ['180:In,Aw,Ip,Iw,In,Aw,In,Iw,Iw,In', '330'],
            /*39*/ ['440:In,Ip,Cp,Aw,Iw,In,An', '660'],
            /*40*/ ['1270:Ap,In,An,Ip,In,Ip,Ip', '1270'],
        ];
    }
}
