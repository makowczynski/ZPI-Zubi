<?

namespace Zubi\DeviceBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use Zubi\DeviceBundle\Entity\Station;

class StationTest extends WebTestCase
{

	public function testVersion() {
		$station = $this->getStation();
		$this->assertNull($station->getVersion());

		$station->setVersion('1.0.0');
		$this->assertEquals('1.0.0', $station->getVersion());

		// TODO: check validators
	}

	public function testCountry() {
		$station = $this->getStation();
		$this->assertNull($station->getCountry());

		$station->setCountry('pl');
		$this->assertEquals('pl', $station->getCountry());

		// TODO: check validators
	}

	public function testStreet() {
		$station = $this->getStation();
		$this->assertNull($station->getStreet());

		$station->setStreet('ul. Testowa 123');
		$this->assertEquals('ul. Testowa 123', $station->getStreet());

		// TODO: check validators
	}

	public function testLatitude() {
		$station = $this->getStation();
		$this->assertNull($station->getLatitude());

		$station->setLatitude('12.232323');
		$this->assertEquals('12.232323', $station->getLatitude());

		// TODO: check validators
	}

	public function testLongitude() {
		$station = $this->getStation();
		$this->assertNull($station->getLongitude());

		$station->setLongitude('12.232323');
		$this->assertEquals('12.232323', $station->getLongitude());

		// TODO: check validators
	}

	public function testUserId() {
		$station = $this->getStation();
		$this->assertNull($station->getUserId());

		$station->setUserId(34);
		$this->assertEquals(34, $station->getUserId());

		// TODO: check validators
	}

	public function getStation($full = false) {
		
		if($full) {
			// TODO: return validated station
			return null;
		} else
			return new Station();
	}
}