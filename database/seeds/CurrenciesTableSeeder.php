<?php

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$currencies = array(
    	          array('AED',
    	           'AED',
    	           'right',
    	           '.',
    	           ','),
    	           array('AFN',
    	           'Af',
    	           'right',
    	           '.',
    	           ','),
    	           array('ALL',
    	           'Lek',
    	           'left',
    	           '.',
    	           ','),
    	           array('ARS',
    	           'ARS',
    	           'right',
    	           '.',
    	           ','),
    	           array('AUD',
    	           'A$',
    	           'left',
    	           '.',
    	           ','),
    	           array('AZN',
    	           '₼',
    	           'right',
    	           '.',
    	           ','),
    	           array('BBD',
    	           '$',
    	           'right',
    	           '.',
    	           ','),
    	           array('BDT',
    	           'Tr',
    	           'right',
    	           '.',
    	           ','),
    	           array('BGN',
    	           'лв',
    	           'right',
    	           '.',
    	           ','),
    	           array('BHD',
    	           'BD',
    	           'right',
    	           '.',
    	           ','),
    	           array('BMD',
    	           '$',
    	           'right',
    	           '.',
    	           ','),
    	           array('BND',
    	           '$',
    	           'right',
    	           '.',
    	           ','),
    	           array('BOB',
    	           'BOB',
    	           'right',
    	           '.',
    	           ','),
    	           array('BRL',
    	           'R$',
    	           'left',
    	           ',',
    	           '.'),
    	           array('BSD',
    	           '$',
    	           'right',
    	           '.',
    	           ','),
    	           array('BWP',
    	           'P',
    	           'right',
    	           '.',
    	           ','),
    	           array('BYN',
    	           'Br',
    	           'right',
    	           '.',
    	           ','),
    	           array('BZD',
    	           'BZ$',
    	           'right',
    	           '.',
    	           ','),
    	           array('CAD',
    	           '$CAD',
    	           'left',
    	           '.',
    	           ','),
    	           array('CHF',
    	           'CHF',
    	           'left',
    	           '.',
    	           ','),
    	           array('CLP',
    	           'CLP',
    	           'right',
    	           '.',
    	           ','),
    	           array('CNY',
    	           'CNY',
    	           'right',
    	           '.',
    	           ','),
    	           array('COP',
    	           'COP',
    	           'right',
    	           '.',
    	           ','),
    	           array('CRC',
    	           '₡',
    	           'right',
    	           '.',
    	           ','),
    	           array('CZK',
    	           'Kč',
    	           'right',
    	           '.',
    	           ','),
    	           array('DKK',
    	           'kr',
    	           'right',
    	           '.',
    	           ','),
    	           array('DOP',
    	           'RD$',
    	           'right',
    	           '.',
    	           ','),
    	           array('DZD',
    	           'DA',
    	           'right',
    	           ',',
    	           '.'),
    	           array('EGP',
    	           'EGP',
    	           'right',
    	           '.',
    	           ','),
    	           array('EUR',
    	           '€',
    	           'right',
    	           ',',
    	           '.'),
    	           array('FJD',
    	           '$',
    	           'right',
    	           '.',
    	           ','),
    	           array('GBP',
    	           '£',
    	           'left',
    	           '.',
    	           ','),
    	           array('GTQ',
    	           'Q',
    	           'right',
    	           '.',
    	           ','),
    	           array('HKD',
    	           'HKD',
    	           'right',
    	           '.',
    	           ','),
    	           array('HNL',
    	           'L',
    	           'right',
    	           '.',
    	           ','),
    	           array('HRK',
    	           'kn',
    	           'right',
    	           '.',
    	           ','),
    	           array('HTG',
    	           'G',
    	           'right',
    	           '.',
    	           ','),
    	           array('HUF',
    	           'Ft',
    	           'right',
    	           '.',
    	           ','),
    	           array('IDR',
    	           'Rp',
    	           'right',
    	           '.',
    	           ','),
    	           array('ILS',
    	           '₪',
    	           'left',
    	           '.',
    	           ','),
    	           array('INR',
    	           '₹',
    	           'right',
    	           '.',
    	           ','),
    	           array('JMD',
    	           'J$',
    	           'right',
    	           '.',
    	           ','),
    	           array('JOD',
    	           'JOD',
    	           'right',
    	           '.',
    	           ','),
    	           array('JPY',
    	           '¥',
    	           'left',
    	           '.',
    	           ','),
    	           array('KES',
    	           'KSh',
    	           'right',
    	           '.',
    	           ',' )
    	           ,
    	           array('KRW',
    	           '₩',
    	           'left',
    	           '.',
    	           ','),
    	           array('KWD',
    	           'KWD',
    	           'right',
    	           '.',
    	           ','),
    	           array('KZT',
    	          '₸',
    	           'right',
    	           '.',
    	           ','),
    	           array('LAK',
    	           '₭',
    	           'right',
    	           '.',
    	           ','),
    	           array('LBP',
    	           'LBP',
    	           'right',
    	           '.',
    	           ','),
    	           array('LKR',
    	           'Rs',
    	           'right',
    	           '.',
    	           ','),
    	           array('LRD',
    	           '$',
    	           'right',
    	           '.',
    	           ','),
    	           array('MAD',
    	           'MAD',
    	           'right',
    	           '.',
    	           ','),
    	           array('MDL',
    	           'MDL',
    	           'right',
    	           '.',
    	           ','),
    	           array('MMK',
    	           'K',
    	           'right',
    	           '.',
    	           ','),
    	           array('MOP',
    	           'MOP$',
    	           'right',
    	           '.',
    	           ','),
    	           array('MRO',
    	           'UM',
    	           'right',
    	           ',',
    	           '.'),
    	           array('MUR',
    	           '₨',
    	           'right',
    	           '.',
    	           ','),
    	           array('MVR',
    	           'Rf, ރ',
    	           'right',
    	           '.',
    	           ','),
    	           array('MXN',
    	           'MXN',
    	           'right',
    	           '.',
    	           ','),
    	           array('MYR',
    	           'RM',
    	           'right',
    	           '.',
    	           ','),
    	           array('NAD',
    	           'NAD',
    	           'right',
    	           '.',
    	           ','),
    	           array('NGN',
    	           '₦',
    	           'right',
    	           '.',
    	           ','),
    	           array('NIO',
    	           'C$',
    	           'right',
    	           '.',
    	           ','),
    	           array('NOK',
    	           'kr',
    	           'right',
    	           '.',
    	           ','),
    	           array('NPR',
    	           '₨',
    	           'right',
    	           '.',
    	           ','),
    	           array('NZD',
    	           'NZD',
    	           'left',
    	           '.',
    	           ','),
    	           array('OMR',
    	           'OMR',
    	           'right',
    	           '.',
    	           ','),
    	           array('PAB',
    	           'B/.',
    	           'right',
    	           '.',
    	           ','),
    	           array('PEN',
    	           'S/.',
    	           'right',
    	           '.',
    	           ','),
    	           array('PGK',
    	           'K',
    	           'right',
    	           '.',
    	           ','),
    	           array('PHP',
    	           '₱',
    	           'right',
    	           '.',
    	           ','),
    	           array('PKR',
    	           'Rs',
    	           'right',
    	           '.',
    	           ','),
    	           array('PLN',
    	           'zł',
    	           'right',
    	           '.',
    	           ','),
    	           array('PYG',
    	           'Gs',
    	           'right',
    	           '.',
    	           ','),
    	           array('QAR',
    	           '﷼',
    	           'right',
    	           '.',
    	           ','),
    	           array('RON',
    	           'LEI',
    	           'right',
    	           ',',
    	           '.'),
    	           array('RSD',
    	           'Дин',
    	           'right',
    	           '.',
    	           ','),
    	           array('RUB',
    	           'руб',
    	           'right',
    	           '.',
    	           ),
    	           array('SAR',
    	           '﷼',
    	           'right',
    	           '.',
    	           ','),
    	           array('SBD',
    	           '$',
    	           'right',
    	           '.',
    	           ','),
    	           array('SCR',
    	           '₨',
    	           'right',
    	           '.',
    	           ','),
    	           array('SEK',
    	           'kr',
    	           'right',
    	           '.',
    	           ','),
    	           array('SGD',
    	           'S$',
    	           'left',
    	           '.',
    	           ','),
    	           array('SVC',
    	           '$',
    	           'right',
    	           '.',
    	           ','),
    	           array('SYP',
    	           '£',
    	           'right',
    	           '.',
    	           ','),
    	           array('THB',
    	           '฿',
    	           'right',
    	           '.',
    	           ','),
    	           array('TND',
    	           'TND',
    	           'right',
    	           ',',
    	           '.'),
    	           array('TOP',
    	           'T$',
    	           'right',
    	           '.',
    	           ','),
    	           array('TRY',
    	           '₺',
    	           'right',
    	           ','
    	           ),array('TTD',
    	           'TT$',
    	           'right',
    	           '.',
    	           ','),
    	           array('TWD',
    	           '角',
    	           'right',
    	           '.',
    	           ','),
    	           array('UAH',
    	           '₴',
    	           'right',
    	           '.',
    	           ','),
    	           array('USD',
    	           '$',
    	           'left',
    	           '.',
    	           ','),
    	           array('UYU',
    	           '$U',
    	           'right',
    	           '.',
    	           ','),
    	           array('VEF',
    	           'Bs',
    	           'right',
    	           '.',
    	           ','),
    	           array('VND',
    	           '₫',
    	           'right',
    				'.',
    	           ',')
    	           ,
    	           array('VUV',
    	           'VT',
    	           'right',
    	           '.',
    	           ','),
    	           array('WST',
    	           '$',
    	           'right',
    	           '.',
    	           ','),
    	           array('XCD',
    	           '$',
    	           'right',
    	           '.',
    	           ','),
    	           array('XOF',
    	           'CFA Franc/ -',
    	           'right',
    	           '.',
    	           ','),
    	           array('YER',
    	           '﷼',
    	           'right',
    	           '.',
    	           ','),
    	           array('ZAR',
    	           'R',
    	           'left',
    	           '.')
    	    	);
        foreach($currencies as $currency){
        	$newCurrency = new Currency();
    		$newCurrency->name = $currency[0];
    		$newCurrency->symbol = $currency[1];
    		$newCurrency->symbol_position = $currency[2];
        	if(count($currency) === 4){
        		$newCurrency->decimal_separator = null;
        		$newCurrency->unit_separator = $currency[3];
        	}else{
        		$newCurrency->decimal_separator = $currency[3];
        		$newCurrency->unit_separator = $currency[4];
        	}
        	$newCurrency->save();
        }

        Currency::where('name', '=', 'USD')->update(['active' => 1]);
    }
}
